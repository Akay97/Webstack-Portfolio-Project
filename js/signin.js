document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("signin-form");

  form.addEventListener("submit", (event) => {
    event.preventDefault();

    const formData = new FormData(form);

    // Send the form data to PHP using AJAX
    fetch("signin.php", {
        method: "POST",
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
          if (data.status === "success") {
            window.location.href = "landing.html";
          } else {
            alert(data.message);
          }
        })
        .catch(error => {
          console.error("Error:", error);
          alert("An error occurred. Please try again later.");
        });
  });
});
