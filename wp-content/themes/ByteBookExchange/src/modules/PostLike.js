import axios from "axios";

class PostLike {
  constructor() {
    if (document.querySelector(".post-like-box")) {
      axios.defaults.headers.common["X-WP-Nonce"] = bbeData.nonce;
      this.events();
    }
  }

  events() {
    document
      .querySelector(".post-like-box")
      .addEventListener("click", (e) => this.ourClickDispatcher(e));
  }

  // methods
  ourClickDispatcher(e) {
    let currentLikeBox = e.target;
    while (!currentLikeBox.classList.contains("post-like-box")) {
      currentLikeBox = currentLikeBox.parentElement;
    }

    if (currentLikeBox.getAttribute("data-present") == "yes") {
      this.deletePostLike(currentLikeBox);
    } else {
      this.createPostLike(currentLikeBox);
    }
  }

  async createPostLike(currentLikeBox) {
    try {
      // Check if the user is logged in
      const loginResponse = await axios.get(
        bbeData.root_url + "/wp-json/bbe/v1/checkLogin"
      );
      if (loginResponse.data === "logged-in") {
        const response = await axios.post(
          `${bbeData.root_url}/wp-json/bbe/v1/managePostLike`,
          { postId: currentLikeBox.getAttribute("data-post") }
        );
        if (response.data != "Only logged in users can create like.") {
          currentLikeBox.setAttribute("data-present", "yes");
          let likeCount = parseInt(
            currentLikeBox.querySelector(".post-like-count").innerHTML,
            10
          );
          likeCount++;
          currentLikeBox.querySelector(".post-like-count").innerHTML =
            likeCount;
          currentLikeBox.setAttribute("data-postLike", response.data);
        }

        // console.log(response.data);
      } else {
        // User is not logged in, redirect to the login page
        alert("Only logged in users can like a post");
        window.location.href = "http://bytebookexchange.com/wp-login.php";
      }
    } catch (e) {
      console.log("Sorry");
    }
  }

  async deletePostLike(currentLikeBox) {
    try {
      const response = await axios({
        url: `${bbeData.root_url}/wp-json/bbe/v1/managePostLike`,
        method: "delete",
        data: { postLike: currentLikeBox.getAttribute("data-postLike") },
      });
      currentLikeBox.setAttribute("data-present", "no");
      let likeCount = parseInt(
        currentLikeBox.querySelector(".post-like-count").innerHTML,
        10
      );
      likeCount--;
      currentLikeBox.querySelector(".post-like-count").innerHTML = likeCount;
      currentLikeBox.setAttribute("data-postLike", "");
    } catch (e) {}
  }
}

export default PostLike;
