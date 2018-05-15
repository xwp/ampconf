/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	'use strict';

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to ); // @todo .site-title is invalid.
		});
	});
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-header__description' ).text( to );
		});
	});

	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-header__description' ).text( to );
		});
	});

	wp.customize( 'header_nav_background_color', function( value ) {
		value.bind( function( to ) {
			$( '.site-header__nav' ).css({
				'background-color': to,
				'box-shadow': '30vw 0 0 ' + to + ', -30vw 0 0 ' + to
			});
		});
	});

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-header__description' ).css({ // @todo .site-title is invalid.
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				});
			} else {
				$( '.site-title, .site-header__description' ).css({ // @todo .site-title is invalid.
					'clip': 'auto',
					'position': 'relative'
				});
				$( '.site-title a, .site-header__description' ).css({ // @todo .site-title is invalid.
					'color': to
				});
			}
		});
	});
}( jQuery ) );
