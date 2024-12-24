document.addEventListener("DOMContentLoaded", function () {
  const logoutButton = document.createElement("button");
  logoutButton.textContent = "Logout";
  logoutButton.id = "logoutButton";
  document.body.appendChild(logoutButton);

  logoutButton.addEventListener("click", function () {
    sessionStorage.clear();
    localStorage.clear();
    window.location.href = "signin.html";
  });
});
