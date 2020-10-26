la_carte = [
  {
    elementType: "geometry.fill",
    stylers: [
      {
        color: "#333333",
      },
    ],
  },
  {
    elementType: "geometry.stroke",
    stylers: [
      {
        color: "#111111",
      },
    ],
  },
  {
    featureType: "road",
    elementType: "geometry.stroke",
    stylers: [
      {
        color: "#000000",
      },
      {
        weight: 2,
      },
    ],
  },
  {
    featureType: "road",
    elementType: "geometry.fill",
    stylers: [
      {
        color: "#000000",
      },
    ],
  },
  {
    featureType: "road",
    elementType: "labels.icon",
    stylers: [
      {
        color: "#cccccc",
      },
      {
        weight: 0.9,
      },
    ],
  },
  {
    elementType: "labels.text",
    stylers: [
      {
        color: "#cccccc",
      },
      {
        weight: 0.9,
      },
    ],
  },
  {
    featureType: "poi",
    elementType: "geometry.fill",
    stylers: [
      {
        color: "#444444",
      },
    ],
  },
  {
    featureType: "poi.park",
    elementType: "geometry.fill",
    stylers: [
      {
        color: "#333333",
      },
    ],
  },
  {
    featureType: "poi.government",
    elementType: "geometry.fill",
    stylers: [
      {
        color: "#444444",
      },
    ],
  },
];

(function ($) {
  $(document).on("ready", function () {
    /**
     * Mobile menu
     */

    $("#hamburguer").on("click", function () {
      $(".main-header").toggleClass("main-header--active");
    });

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
          filtersBtn.textContent = objectL10n.hideFilters;
        } else {
          filtersBtn.textContent = objectL10n.showFilters;
        }
      });
    }

    /**
     * Share buttons
     */

    const shareButtons = document.querySelectorAll(".share__link");

    // If there are share buttons
    if (shareButtons.length > 0) {
      shareButtons.forEach((button) => {
        button.addEventListener("click", (e) => {
          e.preventDefault();

          console.log(e.currentTarget);

          let network = e.currentTarget.getAttribute("data-network");
          let content = e.currentTarget.getAttribute("data-content");
          let url = e.currentTarget.getAttribute("data-url");

          if (network === "facebook") {
            window.open(
              "http://www.facebook.com/sharer.php?u=" + encodeURIComponent(url),
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
    /**
     * Start slick galleries
     */

    $(".hero-slider").slick({
      nextArrow:
        '<button type="button" class="hero-slider__arrow hero-slider__arrow--right"><svg xmlns="http://www.w3.org/2000/svg" class="slider-arrow" viewBox="0 0 200 330"><g id="arrow-right" class="slider-arrow__g"><path d="M194.7 177.82L48 324.69a18.11 18.11 0 01-25.62 0L5.31 307.56a18.15 18.15 0 010-25.62L121.51 165 5.27 48.06a18.15 18.15 0 010-25.62L22.41 5.31a18.11 18.11 0 0125.59 0l146.69 146.87a18.14 18.14 0 01.01 25.64z"/></g></svg></button>',
      prevArrow:
        '<button type="button" class="hero-slider__arrow hero-slider__arrow--left"><svg xmlns="http://www.w3.org/2000/svg" class="slider-arrow" viewBox="0 0 200 330"><g id="arrow-left" class="slider-arrow__g"><path d="M5.3 152.18L152 5.31a18.11 18.11 0 0125.62 0l17.1 17.13a18.15 18.15 0 010 25.62L78.49 165l116.24 116.94a18.15 18.15 0 010 25.62l-17.1 17.13a18.11 18.11 0 01-25.62 0L5.31 177.82a18.14 18.14 0 01-.01-25.64z"/></g></svg></button>',
    });

    $(".slick__slides").slick({
      nextArrow:
        '<button type="button" class="hero-slider__arrow hero-slider__arrow--right"><svg xmlns="http://www.w3.org/2000/svg" class="slider-arrow" viewBox="0 0 200 330"><g id="arrow-right" class="slider-arrow__g"><path d="M194.7 177.82L48 324.69a18.11 18.11 0 01-25.62 0L5.31 307.56a18.15 18.15 0 010-25.62L121.51 165 5.27 48.06a18.15 18.15 0 010-25.62L22.41 5.31a18.11 18.11 0 0125.59 0l146.69 146.87a18.14 18.14 0 01.01 25.64z"/></g></svg></button>',
      prevArrow:
        '<button type="button" class="hero-slider__arrow hero-slider__arrow--left"><svg xmlns="http://www.w3.org/2000/svg" class="slider-arrow" viewBox="0 0 200 330"><g id="arrow-left" class="slider-arrow__g"><path d="M5.3 152.18L152 5.31a18.11 18.11 0 0125.62 0l17.1 17.13a18.15 18.15 0 010 25.62L78.49 165l116.24 116.94a18.15 18.15 0 010 25.62l-17.1 17.13a18.11 18.11 0 01-25.62 0L5.31 177.82a18.14 18.14 0 01-.01-25.64z"/></g></svg></button>',
    });

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
          $(".past-exhibitions__group").removeClass(
            "past-exhibitions__group--active"
          );
          $(".past-exhibitions__grid").slideUp();
          $(this)
            .parent()
            .addClass("past-exhibitions__group--active")
            .children(".past-exhibitions__grid")
            .slideDown(500);
        }
      });
    }

    /**
     * Include Google maps
     */
    if ($("#map-canvas").length > 0) {
      loadMapScript();
    }
  });

  /**
   * Toggle artist bio
   */

  $('.bio__btn').on('click', function () {
    if ($('.bio__hidden').hasClass('bio__hidden--shown')) {
      $('.bio__hidden').slideUp().removeClass('bio__hidden--shown');
      $(this).text(objectL10n.readMore);
    } else {
      $('.bio__hidden').slideDown().addClass('bio__hidden--shown');
      $(this).text(objectL10n.readLess);
    }
  });

})(jQuery);

/**
 * Google Maps
 */
function loadMapScript() {
  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src =
    "//maps.googleapis.com/maps/api/js?key=AIzaSyCrZ41krw8hACJ_MxtBKPRRzrtCEFyxrpA&callback=initializeMap";
  document.body.appendChild(script);
}

function initializeMap() {
  var la_galerie = new google.maps.LatLng(48.863943, 2.36024);
  var drag = true;

  var mapOptions = {
    scrollwheel: false,
    zoom: 17,
    center: la_galerie,
    disableDefaultUI: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    draggable: drag,
  };
  map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
  var marker = new google.maps.Marker({
    position: la_galerie,
    map: map,
    title: "",
  });

  map.setOptions({ styles: la_carte });
}

function showArtwork(artwork) {
  const overlay = document.getElementById("artwork-overlay");
  const imageContainer = overlay.querySelector(
    ".overlay-artwork__img-container"
  );
  const title = overlay.querySelector(".overlay-artwork__title");
  const artist = overlay.querySelector(".overlay-artwork__artist");
  const excerpt = overlay.querySelector(".overlay-artwork__excerpt");
  const availability = overlay.querySelector(".overlay-artwork__availability");
  const price = overlay.querySelector(".overlay-artwork__price");
  const button = overlay.querySelector(".overlay-artwork__button");
  // const formContainer = overlay.querySelector(".overlay-artwork__inquire");
  const formTitle = overlay.querySelector(".overlay-artwork__inquire-title");
  const formElement = overlay.querySelector(".overlay-artwork__inquire-form");
  const aboutTitle = overlay.querySelector(".overlay-artwork__desc-title");
  const description = overlay.querySelector(".overlay-artwork__description");

  let actualPrice;
  if (artwork.showPrice > 0) {
    actualPrice = new Intl.NumberFormat("fr-FR", {
      style: "currency",
      currency: "EUR",
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(artwork.price);
  } else {
    actualPrice = artwork.priceMessage;
  }

  imageContainer.innerHTML = artwork.images;
  title.innerHTML = artwork.title;
  artist.innerHTML = artwork.artist;
  excerpt.innerHTML = artwork.excerpt;
  if (artwork.availability) {
    availability.classList.remove("mc-hidden");
  }
  price.innerHTML = actualPrice;
  button.innerHTML = artwork.button;
  formTitle.innerHTML = artwork.button;
  formElement.innerHTML = artwork.formElement;
  aboutTitle.innerHTML = artwork.aboutTitle;
  description.innerHTML = artwork.description;

  jQuery(".overlay-artwork__inquire").slideUp(0);

  document.getElementsByTagName("body")[0].classList.add("mc-no-overflow");
  document.addEventListener("keydown", closeOnEsc);

  jQuery(".artwork-slider").slick({
    nextArrow:
      '<button type="button" class="hero-slider__arrow hero-slider__arrow--right"><svg xmlns="http://www.w3.org/2000/svg" class="slider-arrow" viewBox="0 0 200 330"><g id="arrow-right" class="slider-arrow__g"><path d="M194.7 177.82L48 324.69a18.11 18.11 0 01-25.62 0L5.31 307.56a18.15 18.15 0 010-25.62L121.51 165 5.27 48.06a18.15 18.15 0 010-25.62L22.41 5.31a18.11 18.11 0 0125.59 0l146.69 146.87a18.14 18.14 0 01.01 25.64z"/></g></svg></button>',
    prevArrow:
      '<button type="button" class="hero-slider__arrow hero-slider__arrow--left"><svg xmlns="http://www.w3.org/2000/svg" class="slider-arrow" viewBox="0 0 200 330"><g id="arrow-left" class="slider-arrow__g"><path d="M5.3 152.18L152 5.31a18.11 18.11 0 0125.62 0l17.1 17.13a18.15 18.15 0 010 25.62L78.49 165l116.24 116.94a18.15 18.15 0 010 25.62l-17.1 17.13a18.11 18.11 0 01-25.62 0L5.31 177.82a18.14 18.14 0 01-.01-25.64z"/></g></svg></button>',
  });

  overlay.classList.add("overlay-artwork--active");
}

function hideArtwork() {
  const overlay = document.getElementById("artwork-overlay");
  overlay
    .querySelector(".overlay-artwork__availability")
    .classList.add("mc-hidden");
  document.getElementsByTagName("body")[0].classList.remove("mc-no-overflow");
  overlay.classList.remove("overlay-artwork--active");
  jQuery(".overlay-artwork__button").fadeIn(0);
  jQuery(".artwork-slider").slick("unslick");
}

function closeOnEsc(e) {
  if (e.keyCode == 27) {
    hideArtwork();
  }
}

function showForm() {
  jQuery(".overlay-artwork__button").fadeOut(0);
  jQuery(".overlay-artwork__inquire").slideDown("slow");
}

/**
 * Set column image sizes
 */

const containers = document.querySelectorAll(
  ".image-row .wp-block-group__inner-container"
);
const p = 16;

function getRatios(columns) {
  let ratios = [];
  let ratioSum = 0;
  for (let i = 0, h, w, ratio; i < columns.length; i++) {
    h = columns[i].querySelector("img").offsetHeight;
    w = columns[i].querySelector("img").offsetWidth;
    ratio = h == 0 ? 0 : w / h;
    ratios[i] = ratio;
    ratioSum += ratio;
  }
  return [ratios, ratioSum];
}

function setImageSizes(container) {
  const n = container.childElementCount;
  const images = container.children;
  let ratiosValues = getRatios(images);

  let ratios = ratiosValues[0];
  let ratioSum = ratiosValues[1];

  let totalWidth = container.offsetWidth;

  let totalHeight = (totalWidth - p * (n - 1)) / ratioSum;

  for (let i = 0, w; i < images.length; i++) {
    w = (100 * totalHeight * ratios[i]) / totalWidth;
    images[i].style.width = w + "%";
  }
}

function setAllImageSizes(containers) {
  for (let i = 0; i < containers.length; i++) {
    setImageSizes(containers[i]);
  }
}

window.onload = function () {
  setAllImageSizes(containers);
};
