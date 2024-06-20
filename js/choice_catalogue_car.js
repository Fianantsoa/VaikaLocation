function places(n){
    let place5 = document.getElementById("place5");
    let place7 = document.getElementById("place7");
    let place9 = document.getElementById("place9");
    let place12 = document.getElementById("place12");
    let place21 = document.getElementById("place21");
    
    switch(n) {
      case 5:
        place5.style.display = "flex";
        place7.style.display = "none";
        place9.style.display = "none";
        place12.style.display = "none";
        place21.style.display = "none";
        break;
      case 7:
          place5.style.display = "none";
          place7.style.display = "flex";
          place9.style.display = "none";
          place12.style.display = "none";
          place21.style.display = "none";
        break;
      case 9:
          place5.style.display = "none";
          place7.style.display = "none";
          place9.style.display = "flex";
          place12.style.display = "none";
          place21.style.display = "none";
        break;
      case 12:
          place5.style.display = "none";
          place7.style.display = "none";
          place9.style.display = "none";
          place12.style.display = "flex";
          place21.style.display = "none";
          break;
      case 21:
            place5.style.display = "none";
            place7.style.display = "none";
            place9.style.display = "none";
            place12.style.display = "none";
            place21.style.display = "flex";
            break;
      default:
    }
  }