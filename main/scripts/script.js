/* Archivo de Scripts (Javascript) */

/* Script para animacion del menu en dispositivos moviles */
var navLinks = document.getElementById("navLinks");
function showMenu() {
  navLinks.style.right = "0";
}
function hideMenu() {
  navLinks.style.right = "-200px";
}

function notavailable() {
  alert("This information is not yet available. Try later.");
}

// Timer Function

function startTimer() {
  var hours = parseInt(document.getElementById("hoursInput").value) || 0;
  var minutes = parseInt(document.getElementById("minutesInput").value) || 0;
  var seconds = parseInt(document.getElementById("secondsInput").value) || 0;

  var totalSeconds = hours * 3600 + minutes * 60 + seconds;

  var timer = setInterval(function () {
    var hoursDisplay = Math.floor(totalSeconds / 3600);
    var minutesDisplay = Math.floor((totalSeconds % 3600) / 60);
    var secondsDisplay = Math.floor(totalSeconds % 60);

    document.getElementById("hours").textContent = padZero(hoursDisplay);
    document.getElementById("minutes").textContent = padZero(minutesDisplay);
    document.getElementById("seconds").textContent = padZero(secondsDisplay);

    if (totalSeconds <= 0) {
      alert("Time Up!");
      clearInterval(timer);
    } else {
      totalSeconds--;
    }
  }, 1000);
}

function padZero(num) {
  return (num < 10 ? "0" : "") + num;
}

{
  // Animation Functions Text

  const textElement = document.querySelector(".animated-text");

  // Function to check if the element is in the viewport
  const isElementInViewport = (el) => {
    const rect = el.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <=
        (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  };

  // Callback function when the element is in the viewport
  const handleElementIntersection = (entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Element is now visible on the screen, apply the animations
        entry.target.style.animation =
          "tracking-in-expand 0.7s cubic-bezier(0.215, 0.61, 0.355, 1) 1s both";
      }
    });
  };

  // Options for the Intersection Observer
  const options = {
    threshold: 0, // 0.5 means 50% of the element needs to be visible to trigger the animation
  };

  // Create the Intersection Observer
  const observer = new IntersectionObserver(handleElementIntersection, options);

  // Start observing the text element
  observer.observe(textElement);
}

{
  // Animation Functions Text

  const textElement = document.querySelector(".animated-text2");

  // Function to check if the element is in the viewport
  const isElementInViewport = (el) => {
    const rect = el.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <=
        (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  };

  // Callback function when the element is in the viewport
  const handleElementIntersection = (entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Element is now visible on the screen, apply the animations
        entry.target.style.animation =
          "tracking-in-expand 0.7s cubic-bezier(0.215, 0.61, 0.355, 1) 1s both";
      }
    });
  };

  // Options for the Intersection Observer
  const options = {
    threshold: 0, // 0.5 means 50% of the element needs to be visible to trigger the animation
  };

  // Create the Intersection Observer
  const observer = new IntersectionObserver(handleElementIntersection, options);

  // Start observing the text element
  observer.observe(textElement);
}

{
  // Animation Functions Boxes

  const textElement = document.querySelector(".info1");

  // Function to check if the element is in the viewport
  const isElementInViewport = (el) => {
    const rect = el.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <=
        (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  };

  // Callback function when the element is in the viewport
  const handleElementIntersection = (entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Element is now visible on the screen, apply the animations
        entry.target.style.animation =
          "scale-in-ver-top 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) 2s both";
      }
    });
  };

  // Options for the Intersection Observer
  const options = {
    threshold: 0, // 0.5 means 50% of the element needs to be visible to trigger the animation
  };

  // Create the Intersection Observer
  const observer = new IntersectionObserver(handleElementIntersection, options);

  // Start observing the text element
  observer.observe(textElement);
}

{
  // Animation Functions Boxes

  const textElement = document.querySelector(".info2");

  // Function to check if the element is in the viewport
  const isElementInViewport = (el) => {
    const rect = el.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <=
        (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  };

  // Callback function when the element is in the viewport
  const handleElementIntersection = (entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Element is now visible on the screen, apply the animations
        entry.target.style.animation =
          "scale-in-ver-top 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) 3s both";
      }
    });
  };

  // Options for the Intersection Observer
  const options = {
    threshold: 0, // 0.5 means 50% of the element needs to be visible to trigger the animation
  };

  // Create the Intersection Observer
  const observer = new IntersectionObserver(handleElementIntersection, options);

  // Start observing the text element
  observer.observe(textElement);
}

{
  // Animation Functions Boxes

  const textElement = document.querySelector(".info3");

  // Function to check if the element is in the viewport
  const isElementInViewport = (el) => {
    const rect = el.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <=
        (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  };

  // Callback function when the element is in the viewport
  const handleElementIntersection = (entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Element is now visible on the screen, apply the animations
        entry.target.style.animation =
          "scale-in-ver-top 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) 4s both";
      }
    });
  };

  // Options for the Intersection Observer
  const options = {
    threshold: 0, // 0.5 means 50% of the element needs to be visible to trigger the animation
  };

  // Create the Intersection Observer
  const observer = new IntersectionObserver(handleElementIntersection, options);

  // Start observing the text element
  observer.observe(textElement);
}
