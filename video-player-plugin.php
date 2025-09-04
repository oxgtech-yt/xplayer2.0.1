<?php
/**
 * Plugin Name: xplayer
 * Plugin URI: https://xdisck.site/
 * Description: A custom video player plugin with advanced controls and features
 * Version: 2.0.1
 * Author: Team Wing
 * Author URI: https://xvips.top
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: xvips.top
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('VIDEO_PLAYER_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('VIDEO_PLAYER_PLUGIN_URL', plugin_dir_url(__FILE__));

// Enqueue scripts and styles
function video_player_enqueue_assets() {
    wp_enqueue_style('video-player-style', VIDEO_PLAYER_PLUGIN_URL . 'assets/css/styles.css');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css');
    wp_enqueue_script('video-player-script', VIDEO_PLAYER_PLUGIN_URL . 'assets/js/script.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'video_player_enqueue_assets');

// Register shortcode
function video_player_shortcode($atts) {
    // Default attributes
    $atts = shortcode_atts(array(
        'video_url' => VIDEO_PLAYER_PLUGIN_URL . 'assets/videos/sample.mp4',
    ), $atts);

    ob_start();
    ?>
    <div class="video-container">
        <div class="video-player">
            <video id="mainVideo" controls>
                <source src="<?php echo esc_url($atts['video_url']); ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            
            <div class="video-controls">
                <div class="left-controls">
                    <button id="playPauseBtn" class="control-btn"><i class="fa-solid fa-play"></i></button>
                    <span class="time-display"><span id="currentTime">0:00</span> / <span id="duration">0:00</span></span>
                    <input type="range" id="progressBar" min="0" value="0">
                </div>
                <div class="right-controls">
                    <div class="quality-selector">
                        <select id="qualitySelect">
                            <option value="auto">Auto</option>
                            <option value="720">720p</option>
                            <option value="1080">1080p</option>
                        </select>
                    </div>
                    <div class="speed-selector">
                        <select id="speedSelect">
                            <option value="0.5">0.5x</option>
                            <option value="0.75">0.75x</option>
                            <option value="1" selected>1x</option>
                            <option value="1.25">1.25x</option>
                            <option value="1.5">1.5x</option>
                            <option value="2">2x</option>
                        </select>
                    </div>
                    <button id="fullscreenBtn" class="control-btn"><i class="fa-solid fa-expand"></i></button>
                </div>
            </div>
            
            <div class="video-info">
                <div class="meta-info">
                </div>
            </div>
        </div>
        
        <div class="video-sidebar">
            <div class="join-channels">
                <h3 class="join-title">Join Our Channels</h3>
                <div class="channel-buttons">
                    <a href="https://whatsapp.com/channel/0029VbAPiHW2ER6bFJkzuU06" target="_blank" class="channel-btn whatsapp-btn">
                        <div class="btn-icon">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div class="btn-content">
                            <span class="btn-title">WhatsApp</span>
                            <span class="btn-subtitle">Join Channel</span>
                        </div>
                        <div class="btn-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                    
                    <a href="https://t.me/xvipstop" target="_blank" class="channel-btn telegram-btn">
                        <div class="btn-icon">
                            <i class="fab fa-telegram-plane"></i>
                        </div>
                        <div class="btn-content">
                            <span class="btn-title">Telegram</span>
                            <span class="btn-subtitle">Join Channel</span>
                        </div>
                        <div class="btn-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                    
                    <a href="https://www.instagram.com/xvips_offical" target="_blank" class="channel-btn instagram-btn">
                        <div class="btn-icon">
                            <i class="fab fa-instagram"></i>
                        </div>
                        <div class="btn-content">
                            <span class="btn-title">Instagram</span>
                            <span class="btn-subtitle">Follow Us</span>
                        </div>
                        <div class="btn-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('video_player', 'video_player_shortcode');