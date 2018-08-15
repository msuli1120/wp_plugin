window.addEventListener("load", function() {
  var tabs = document.querySelectorAll("ul.nav-tabs > li");

  for (var i = 0; i < tabs.length; i ++) {
    tabs[i].addEventListener("click", switchTab);
  }

  function switchTab(event) {
    // console.log(event);
    event.preventDefault();

    document.querySelector("ul.nav-tabs li.active").classList.remove("active");
    document.querySelector(".tab-pane.active").classList.remove("active");

    var clickedTab = event.currentTarget;
    var anchor = event.target;
    var anchorPaneId = anchor.getAttribute("href");
    // console.log(anchor);

    clickedTab.classList.add("active");
    document.querySelector(anchorPaneId).classList.add("active");
  }

});



