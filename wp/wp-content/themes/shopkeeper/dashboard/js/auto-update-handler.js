/**
 * Auto-Update Handler JavaScript
 * Handles AJAX requests for enabling theme auto-updates
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        // Handle auto-update enable button clicks
        $(document).on('click', '.gbt-enable-auto-updates', function(e) {
            e.preventDefault();
            
            const $button = $(this);
            const themeSlug = $button.data('theme');
            const $container = $button.closest('.relative');
            
            // Disable ALL buttons and show loading state
            const originalText = $button.text();
            $('.gbt-enable-auto-updates').prop('disabled', true);
            $('.gbt-enable-auto-updates').text('Enabling...');
            
            // Make AJAX request
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'gbt_enable_auto_updates',
                    theme_slug: themeSlug,
                    nonce: gbtAutoUpdateData.nonce
                },
                success: function(response) {
                    if (response.success) {
                        // Update ALL auto-update sections on the page
                        $('.gbt-auto-update-section').each(function() {
                            const $section = $(this);
                            
                            // Update icon using data attribute
                            $section.find('.gbt-auto-update-icon path').attr('d', $section.data('success-icon'));
                            
                            // Update title using data attribute
                            $section.find('.gbt-auto-update-title').text($section.data('success-title'));
                            
                            // Update description using data attribute
                            $section.find('.gbt-auto-update-description').html($section.data('success-description'));
                            
                            // Hide the button after successful update
                            $section.find('dd:last').hide();
                            
                            // Add pulsing background effect (2 pulses)
                            function pulseBackground() {
                                $section.css('background-color', 'var(--color-wp-green)');
                                $section.css('color', 'white');
                                
                                setTimeout(function() {
                                    $section.css('background-color', '');
                                    $section.css('color', '');
                                }, 250);
                            }
                            
                            $section.addClass('transition-colors duration-500');
                            
                            // First pulse
                            pulseBackground();
                            
                            // Second pulse after first one completes
                            setTimeout(function() {
                                pulseBackground();
                            }, 500);
                        });
                    } else {
                        // Restore ALL buttons on error
                        $('.gbt-enable-auto-updates').prop('disabled', false);
                        $('.gbt-enable-auto-updates').text(originalText);
                    }
                },
                error: function(xhr, status, error) {
                    // Restore ALL buttons on error
                    $('.gbt-enable-auto-updates').prop('disabled', false);
                    $('.gbt-enable-auto-updates').text(originalText);
                }
            });
        });
    });

})(jQuery);
