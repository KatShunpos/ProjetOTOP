document.addEventListener("DOMContentLoaded", function () {
  const buttons = document.querySelectorAll('input[type="button"]');
  const contentDiv = document.getElementById("content");
  const topGroup = document.querySelector(".top-group");
  const bottomGroup = document.querySelector(".bottom-group");

  buttons.forEach((button) => {
    button.addEventListener("click", function () {
      const category = this.value.toLowerCase();
      // Hide the top-group and bottom-group
      topGroup.classList.add("hidden");
      bottomGroup.classList.add("hidden");
      loadContent(category);
    });
  });

  function loadContent(category) {
    fetch(`/1 - HTML/1B - HTML Catégorie/${category}.html`)
      .then((response) => response.text())
      .then((data) => {
        contentDiv.innerHTML = data;
      })
      .catch((error) => {
        contentDiv.innerHTML = `<p>Error loading content: ${error}</p>`;
      });
  }
});
