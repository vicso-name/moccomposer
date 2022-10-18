$(document).ready(function () {

    if ($('.tmobile').length ){
        var isMobile = false;
        if ((/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))) {
            isMobile = true;
            console.log(isMobile);
        }
        else {
            var i;
            for (i=1; i<=2; i++) {
                document.getElementById('interaction-poster'+i).classList.remove('mobile');
                playVideo('interaction-video'+i, 'interaction-poster'+i);
            }
        }

    }

    function playVideo(videoId, videoFrameId) {

        var video = document.getElementById(videoId),
            videoFrame = document.getElementById(videoFrameId);
        if (typeof video !== 'undefined') {
            videoFrame.addEventListener('click', function() {
                if (video.paused) {
                    video.play();
                    videoFrame.classList.remove('paused');
                } else {
                    video.pause();
                    videoFrame.classList.add('paused');
                }
            });

            video.load();
            // video.play();


            var promise = video.play();

            if (promise !== undefined) {
                promise.catch(function(error) {
                    video.setAttribute("controls","controls");
                    videoFrame.classList.add('hidden');
                }).then(function() {
                    // Auto-play started
                });
            }
        }

    }


});