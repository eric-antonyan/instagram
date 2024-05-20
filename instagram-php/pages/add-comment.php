<div class="add__comment flex">
  <img class="set__comment__user-pic" width="40" src="../users/<?= getUser($_SESSION['userdata']['id'])['pic'] ?>" alt="">
  <input id="addCommentText" class="add__comment-text" placeholder="Add comment for <?= getUser($post['uid'])['username'] ?>" type="text">
  <button onclick="add(<?= $post['id'] ?>)" class="add__comment-button flex">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z" />
    </svg>
  </button>
</div>
<script>
  const input = document.querySelector('#addCommentText');
  const profileNav = document.querySelector('.profile__container');
  input.addEventListener('focus', function() {
    profileNav.classList.add('sticky-nav')
  })
</script>