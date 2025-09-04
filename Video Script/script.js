// Video Player Functionality
document.addEventListener('DOMContentLoaded', function() {
    const video = document.getElementById('mainVideo');
    const playPauseBtn = document.getElementById('playPauseBtn');
    const progressBar = document.getElementById('progressBar');
    const currentTimeDisplay = document.getElementById('currentTime');
    const durationDisplay = document.getElementById('duration');
    const qualitySelect = document.getElementById('qualitySelect');
    const speedSelect = document.getElementById('speedSelect');
    const fullscreenBtn = document.getElementById('fullscreenBtn');
    
    // Play/Pause functionality
    playPauseBtn.addEventListener('click', togglePlayPause);
    video.addEventListener('click', togglePlayPause);
    
    function togglePlayPause() {
        if (video.paused) {
            video.play();
            playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
        } else {
            video.pause();
            playPauseBtn.innerHTML = '<i class="fas fa-play"></i>';
        }
    }
    
    // Update progress bar
    video.addEventListener('timeupdate', updateProgressBar);
    
    function updateProgressBar() {
        progressBar.value = (video.currentTime / video.duration) * 100;
        currentTimeDisplay.textContent = formatTime(video.currentTime);
    }
    
    // Set video time when progress bar is changed
    progressBar.addEventListener('input', function() {
        const time = (progressBar.value / 100) * video.duration;
        video.currentTime = time;
    });
    
    // Format time in minutes:seconds
    function formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${mins}:${secs < 10 ? '0' : ''}${secs}`;
    }
    
    // Update duration display when metadata is loaded
    video.addEventListener('loadedmetadata', function() {
        durationDisplay.textContent = formatTime(video.duration);
    });
    
    // Quality selector (simulated)
    qualitySelect.addEventListener('change', function() {
        alert(`Video quality changed to ${qualitySelect.value}`);
        // In a real implementation, this would switch video sources
    });
    
    // Playback speed
    speedSelect.addEventListener('change', function() {
        video.playbackRate = speedSelect.value;
    });
    
    // Fullscreen
    fullscreenBtn.addEventListener('click', function() {
        if (video.requestFullscreen) {
            video.requestFullscreen();
        } else if (video.webkitRequestFullscreen) {
            video.webkitRequestFullscreen();
        } else if (video.msRequestFullscreen) {
            video.msRequestFullscreen();
        }
    });
    
    // Video ended event
    video.addEventListener('ended', function() {
        playPauseBtn.innerHTML = '<i class="fas fa-play"></i>';
    });
});

// Admin Panel Functionality
function openAdminPanel() {
    document.getElementById('adminOverlay').style.display = 'flex';
}

function closeAdminPanel() {
    document.getElementById('adminOverlay').style.display = 'none';
    document.getElementById('adminControls').classList.add('hidden');
    document.getElementById('adminForm').reset();
}

function adminLogin() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    
    // Simple validation (in a real app, this would be server-side)
    if (username === 'admin' && password === 'password123') {
        document.getElementById('adminControls').classList.remove('hidden');
        document.getElementById('adminForm').classList.add('hidden');
    } else {
        alert('Invalid username or password');
    }
}

// Admin control functions
function addVideo() {
    alert('Add Video functionality would go here');
}

function removeVideo() {
    alert('Remove Video functionality would go here');
}

function updateAds() {
    alert('Update Ads functionality would go here');
}

function viewUsers() {
    alert('View Users functionality would go here');
}

// Close admin panel when clicking outside
window.addEventListener('click', function(event) {
    const adminOverlay = document.getElementById('adminOverlay');
    if (event.target === adminOverlay) {
        closeAdminPanel();
    }
});