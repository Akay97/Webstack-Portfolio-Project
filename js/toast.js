// A function to display a toast message after a successful login
function showToast(message, type = 'success') {
  const toast = document.getElementById('toast');
  toast.textContent = message;
  toast.className = `toast ${type}`;
  toast.style.display = 'block';

  setTimeout(() => {
    toast.style.display = 'none';
  }, 5000);
}

// Ensure toast only show after a successful login
document.addEventListener('DOMContentLoaded', () => {
  const isToastShown = sessionStorage.getItem('toastShown');

  if (!isToastShown) {
    showToast('Login successful! Welcome to Applicable Store!');
    sessionStorage.setItem('toastShown', 'true');
  }
});
