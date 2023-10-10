import axios from "axios";

class Like {
  constructor() {
    if (document.querySelector(".like-box")) {
      axios.defaults.headers.common["X-WP-Nonce"] = bbeData.nonce;
      this.events();
    }
  }

  events() {
    document
      .querySelector(".like-box")
      .addEventListener("click", (e) => this.ourClickDispatcher(e));
  }

  // methods
  ourClickDispatcher(e) {
    let currentLikeBox = e.target;
    while (!currentLikeBox.classList.contains("like-box")) {
      currentLikeBox = currentLikeBox.parentElement;
    }

    if (currentLikeBox.getAttribute("data-exists") == "yes") {
      this.deleteLike(currentLikeBox);
    } else {
      this.createLike(currentLikeBox);
    }
  }

  async createLike(currentLikeBox) {
    try {
      // Check if the user is logged in
      const loginResponse = await axios.get(
        bbeData.root_url + "/wp-json/bbe/v1/checkLogin"
      );
      if (loginResponse.data === "logged-in") {
        const response = await axios.post(
          bbeData.root_url + "/wp-json/bbe/v1/manageLike",
          { instructorId: currentLikeBox.getAttribute("data-instructor") }
        );
        // to create a like, user has to sign in first
        if (response.data != "Only logged in users can like.") {
          currentLikeBox.setAttribute("data-exists", "yes");
          var likeCount = parseInt(
            currentLikeBox.querySelector(".like-count").innerHTML,
            10
          );
          likeCount++;
          currentLikeBox.querySelector(".like-count").innerHTML = likeCount;
          currentLikeBox.setAttribute("data-like", response.data);
        }
      } else {
        // User is not logged in, redirect to the login page
        alert("Only logged in users can like an instructor");
        window.location.href = "http://bytebookexchange.com/wp-login.php";
      }
    } catch (e) {
      console.log("Sorry");
    }
  }

  async deleteLike(currentLikeBox) {
    try {
      const response = await axios({
        url: bbeData.root_url + "/wp-json/bbe/v1/manageLike",
        method: "delete",
        data: { like: currentLikeBox.getAttribute("data-like") },
      });
      currentLikeBox.setAttribute("data-exists", "no");
      let likeCount = parseInt(
        currentLikeBox.querySelector(".like-count").innerHTML,
        10
      );
      likeCount--;
      currentLikeBox.querySelector(".like-count").innerHTML = likeCount;
      currentLikeBox.setAttribute("data-like", "");
      // console.log(response.data);
    } catch (e) {
      console.log(e);
    }
  }
}

export default Like;
