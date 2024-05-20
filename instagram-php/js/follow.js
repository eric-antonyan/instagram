const followBtn = document.querySelector('.follow');

followBtn.addEventListener('click', function() {
  // followBtn.innerHTML = 'Followed <i class="far fa-circle-check"></i>';
  followBtn.disabled = true;
})