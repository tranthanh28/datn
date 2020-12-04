const videoContainer = document.querySelector("#videos");

const vm = new Vue({
  el: "#app",
  data: {
    userToken: "",
    roomId: "",
    roomToken: "",
    room: undefined,
    callClient: undefined
  },
  computed: {
    roomUrl: function() {
      return `http://${location.hostname}/datn/phonghoc.php?room=${this.roomId}`;
    }
  },
  // khi chương trình chạy
  async mounted() {
    // cài đặt RestToken
    api.setRestToken();

    //tham gia phòng bằng địa chỉ URL
    const urlParams = new URLSearchParams(location.search);
    const roomId = urlParams.get("room");
    if (roomId) {
      this.roomId = roomId;

      await this.join();
    }
  },
  methods: {
    authen: function() {
      return new Promise(async resolve => {
        const userId = `${(Math.random() * 100000).toFixed(6)}`;
        const userToken = await api.getUserToken(userId);
        this.userToken = userToken;

        if (!this.callClient) {
          //tạo client kết nối với hệ thống Stringee
          const client = new StringeeClient();
          // kiểm tra client đã kết nối hệ thống
          client.on("authen", function(res) {
            console.log("on authen: ", res);
            resolve(res);
          });
          this.callClient = client;
        }
        //client sử dụng userToken
        this.callClient.connect(userToken);
      });
    },
    publish: async function(screenSharing = false) {
      //tạo video ở máy local
      const localTrack = await StringeeVideo.createLocalVideoTrack(
        this.callClient,
        {
          audio: true,
          video: true,
          screen: screenSharing,
          videoDimensions: { width: 640, height: 360 }
        }
      );

      const videoElement = localTrack.attach();
      this.addVideo(videoElement);
      //các video khác join vào
      const roomData = await StringeeVideo.joinRoom(
        this.callClient,
        this.roomToken
      );
      const room = roomData.room;
      console.log({ roomData, room });

      if (!this.room) {
        this.room = room;
        room.clearAllOnMethos();
        //sự  kiện có video được thêm vào
        room.on("addtrack", e => {
          const track = e.info.track;
          console.log("addtrack", track);
          //nếu là video ở máy local thì return
          if (track.serverId === localTrack.serverId) {
            console.log("local");
            return;
          }
          //là video mới thì thêm video
          this.subscribe(track);
        });
        //khi có sự kiện thoát video
        room.on("removetrack", e => {
          const track = e.track;
          if (!track) {
            return;
          }
          //xóa video đấy đi
          const mediaElements = track.detach();
          mediaElements.forEach(element => element.remove());
        });

        // Join existing tracks
        //hien thi cac video trong list tracks
        roomData.listTracksInfo.forEach(info => this.subscribe(info));
      }
      //public các video khác lên local
      await room.publish(localTrack);
      console.log("room publish successful");
    },
    createRoom: async function() {
      const room = await api.createRoom();
      const roomId = room;
      const roomToken = await api.getRoomToken(roomId);

      this.roomId = roomId;
      this.roomToken = roomToken;
      console.log({ roomId, roomToken });

      await this.authen();
      await this.publish();
    },
    join: async function() {
      const roomToken = await api.getRoomToken(this.roomId);
      this.roomToken = roomToken;

      await this.authen();
      await this.publish();
    },
    joinWithId: async function() {
      const roomId = prompt("Nhập Room Id!");
      if (roomId) {
        this.roomId = roomId;
        await this.join();
      }
    },
    subscribe: async function(trackInfo) {
      const track = await this.room.subscribe(trackInfo.serverId);
      track.on("ready", () => {
        const videoElement = track.attach();
        this.addVideo(videoElement);
      });
    },
    addVideo: function(video) {
      video.setAttribute("controls", "true");
      video.setAttribute("playsinline", "true");
      videoContainer.appendChild(video);
    }
  }
});
