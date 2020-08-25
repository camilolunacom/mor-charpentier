la_carte = [
  {
    "elementType": "geometry.fill",
    "stylers": [
      {
      	"color": "#333333"
      }
    ]
  },
  {
    "elementType": "geometry.stroke",
    "stylers": [
      {
      	"color": "#111111"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry.stroke",
    "stylers": [
      {
      	"color": "#000000"
      },
      {
      	"weight": 2
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry.fill",
    "stylers": [
      {
      	"color": "#000000"
      }
    ]
  },
  {
  	"featureType": "road",
    "elementType": "labels.icon",
    "stylers": [
      {
      	"color": "#cccccc"
      },
      {
      	"weight": 0.9
      }
    ]
  },
  {
    "elementType": "labels.text",
    "stylers": [
      {
      	"color": "#cccccc"
      },
      {
      	"weight": 0.9
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry.fill",
    "stylers": [
      {
      	"color": "#444444"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry.fill",
    "stylers": [
      {
      	"color": "#333333"
      }
    ]
  },
  {
    "featureType": "poi.government",
    "elementType": "geometry.fill",
    "stylers": [
      {
      	"color": "#444444"
      }
    ]
  }
];

window.onload = () => {

  /**
   * Header 
   */
  const mainHeader = document.querySelector(".main-header");
  let scrollTop;

  window.addEventListener("scroll", () => {
    scrollTop = document.documentElement.scrollTop;

    if (scrollTop > 80) {
      mainHeader.classList.add("main-header--fixed");
    } else {
      mainHeader.classList.remove("main-header--fixed");
    }
  });

  /**
   * News page
   */

  const filters = document.querySelector(".filters");

  // If there are filters
  if (filters) {
    const filtersBtn = filters.querySelector(".filters__btn");
    filtersBtn.addEventListener("click", () => {
      filters.classList.toggle("filters--active");
      if (filtersBtn.textContent === "Show filters") {
        filtersBtn.textContent = "Hide filters";
      } else {
        filtersBtn.textContent = "Show filters";
      }
    });
  }

  /**
   * Share buttons
   */

  const shareButtons = document.querySelectorAll(".share__btn");

  // If there are share buttons
  if (shareButtons.length > 0) {
    shareButtons.forEach((button) => {
      button.addEventListener("click", (e) => {
        e.preventDefault();

        console.log(e.target);

        let network = e.target.getAttribute("data-network");
        let content = e.target.getAttribute("data-content");
        let url = e.target.getAttribute("data-url");

        if (network === "facebook") {
          window.open(
            "http://www.facebook.com/sharer.php?u=" +
              encodeURIComponent(url) +
              "&t=" +
              encodeURIComponent(content),
            "facebook",
            "height=700,width=550,resizable=1"
          );
        } else if (network === "twitter") {
          window.open(
            "http://twitter.com/share?url=" +
              encodeURIComponent(url) +
              "&text=" +
              encodeURIComponent(content) +
              "&count=none/",
            "tweet",
            "height=350,width=600,resizable=1"
          );
        }
      });
    });
  }
};

(function ($) {

  $(document).on('ready', function () {

    /**
     * Start Glide galleries
     */

    if ($(".glide").length) {
      new Glide('.glide').mount();
    }

    /** 
     * Past exhibitions
     */
    if ($(".past-exhibitions__year").length > 0) {
      $(".past-exhibitions__grid").slideUp();

      $(".past-exhibitions__year").on("click", function () {
        if ($(this).parent().hasClass("past-exhibitions__group--active")) {
          $(this)
            .parent()
            .removeClass("past-exhibitions__group--active")
            .children(".past-exhibitions__grid")
            .slideUp(500);
        } else {
          $(".past-exhibitions__group").removeClass("past-exhibitions__group--active");
          $(".past-exhibitions__grid").slideUp();
          $(this)
            .parent()
            .addClass("past-exhibitions__group--active")
            .children(".past-exhibitions__grid").slideDown(500);
        }
      });
    }

    /**
     * Include Google maps
     */
    if ($('#map-canvas').length > 0) {
      loadMapScript();
    }
  });
})(jQuery);

/**
 * Google Maps
 */
function loadMapScript() {
	var script = document.createElement("script");
	script.type = "text/javascript";
	script.src = "//maps.googleapis.com/maps/api/js?key=AIzaSyCrZ41krw8hACJ_MxtBKPRRzrtCEFyxrpA&callback=initializeMap";
	document.body.appendChild(script);
}

function initializeMap() {
  var la_galerie = new google.maps.LatLng(48.863943, 2.360240);
  var drag = true;

  var mapOptions = {
    scrollwheel: false,
    zoom: 17,
    center: la_galerie,
    disableDefaultUI: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    draggable: drag
  }
  map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
  var marker = new google.maps.Marker({
    position: la_galerie,
    map: map,
    title: ''
  });

  map.setOptions({styles: la_carte});
}

