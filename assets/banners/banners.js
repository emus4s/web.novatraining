(function () {
    function onImagesLoaded(container, event) {
        var preloads = []; 
        preloads.push.apply(preloads, container.getElementsByTagName("img")); 
        preloads.push.apply(preloads, container.getElementsByTagName("lottie-player"));
         preloads.push.apply(preloads, container.getElementsByTagName("video")); 
         var loaded = preloads.length; 
         for (var i = 0; i < preloads.length; i++) { 
            var tag = preloads[i].tagName.toLowerCase(); 
            if (tag === "lottie-player") { 
                preloads[i].addEventListener("ready", function () {
                     loaded--; 
                     if (loaded == 0) { 
                        event(); 
                    } 
                }); 
            } 
            else if (tag === "video") {
                 preloads[i].addEventListener('loadeddata', function () { 
                    loaded--; 
                    if (loaded == 0) { 
                        event(); 
                    } 
                }, 
                false);
             }
              else if (tag === "img") { 
                if (preloads[i].complete) {
                     loaded--; 
                }
                else { 
                    preloads[i].addEventListener("load", function () { 
                        loaded--; 
                        if (loaded == 0) { 
                            event(); 
                        } 
                    }); 
                } 
                if (loaded == 0) { 
                    event(); 
                } 
            } 
        }
    } 
    onImagesLoaded(document.getElementById("b_03"), function () {
        var elements = document.getElementById("b_03").getElementsByClassName('js-bnfy'); 
        for (var i = 0; i < elements.length; i++) { 
            elements[i].style.display = 'block'; 
        } 
        var playCount = 0; 
        var lastPlay = true; 
        
        function handleExits() {
            var el_img_03 = document.getElementById("img_03");
            var el_img_1831 = document.getElementById("img_1831");
            var el_img_1841 = document.getElementById("img_1841");
            var el_img_1842 = document.getElementById("img_1842");
            var el_img_1846 = document.getElementById("img_1846");
            var el_img_1843 = document.getElementById("img_1843");
            var el_img_1848 = document.getElementById("img_1848");
            var el_img_1845 = document.getElementById("img_1845");
            var el_img_1847 = document.getElementById("img_1847");
            var el_img_1844 = document.getElementById("img_1844");
        } handleExits();
    });
})();