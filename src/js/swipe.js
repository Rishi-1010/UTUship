document.addEventListener('DOMContentLoaded', function() {
  let currentIndex = 0;
  let profiles = [];

  fetch('src/get_users.php')
    .then(response => response.json())
    .then(data => {
      profiles = data;
      showProfile(currentIndex);
    })
    .catch(error => console.error('Error fetching users:', error));

  function showProfile(index) {
    const profileContainer = document.getElementById('profile-container');
    profileContainer.innerHTML = '';

    if (index < profiles.length) {
      const profile = profiles[index];
      const profileCard = document.createElement('div');
      profileCard.className = 'profile-card';
      profileCard.innerHTML = `
        <img src="${profile.profile_picture}" alt="${profile.name}">
        <h3>${profile.name}</h3>
        <div class="swipe-overlay"></div>
      `;
      profileContainer.appendChild(profileCard);

      // Add swipe event listeners
      let startX;
      profileCard.addEventListener('touchstart', function(event) {
        startX = event.touches[0].clientX;
      });

      profileCard.addEventListener('touchmove', function(event) {
        const currentX = event.touches[0].clientX;
        const diffX = currentX - startX;
        const overlay = profileCard.querySelector('.swipe-overlay');

        if (diffX > 0) {
          // Swiping right
          overlay.style.backgroundColor = 'rgba(40, 167, 69, 0.8)'; // Green overlay
          overlay.style.opacity = '1';
        } else if (diffX < 0) {
          // Swiping left
          overlay.style.backgroundColor = 'rgba(220, 53, 69, 0.8)'; // Red overlay
          overlay.style.opacity = '1';
        }
      });

      profileCard.addEventListener('touchend', function(event) {
        const endX = event.changedTouches[0].clientX;
        const overlay = profileCard.querySelector('.swipe-overlay');
        overlay.style.opacity = '0';

        if (startX - endX > 50) {
          // Swiped left
          profileCard.classList.add('swipe-left');
          setTimeout(() => {
            currentIndex++;
            showProfile(currentIndex);
          }, 300);
        } else if (endX - startX > 50) {
          // Swiped right
          profileCard.classList.add('swipe-right');
          setTimeout(() => {
            currentIndex++;
            showProfile(currentIndex);
          }, 300);
        }
      });
    } else {
      profileContainer.innerHTML = '<p>No more profiles to show.</p>';
    }
  }
});