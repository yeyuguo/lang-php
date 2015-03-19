(function($) {

	skel.init({
		reset: 'full',
		breakpoints: {

			// Global.
				global: {
					href: 'assets/css/style.css',
					containers: 1400,
					grid: {
						gutters: ['2em', 0]
					}
				},

			// XLarge.
				xlarge: {
					media: '(max-width: 1680px)',
					href: 'assets/css/style-xlarge.css',
					containers: 1200
				},

			// Large.
				large: {
					media: '(max-width: 1280px)',
					href: 'assets/css/style-large.css',
					containers: 960,
					grid: {
						gutters: ['1.5em', 0]
					},
					viewport: {
						scalable: false
					}
				},

			// Medium.
				medium: {
					media: '(max-width: 980px)',
					href: 'assets/css/style-medium.css',
					containers: '90%',
					grid: {
						zoom: 2
					}
				},

			// Small.
				small: {
					media: '(max-width: 736px)',
					href: 'assets/css/style-small.css',
					containers: '90%',
					grid: {
						gutters: ['1em', 0]
					}
				},

			// XSmall.
				xsmall: {
					media: '(max-width: 480px)',
					href: 'assets/css/style-xsmall.css',
					grid: {
						zoom: 3
					}
				}

		},
		plugins: {
			layers: {

				// Config.
					config: {
						mode: 'transform'
					},

				// Navigation Panel.
					navPanel: {
						animation: 'pushX',
						breakpoints: 'medium',
						clickToHide: true,
						height: '100%',
						hidden: true,
						html: '<div data-action="moveElement" data-args="sidebar"></div>',
						orientation: 'vertical',
						position: 'top-left',
						side: 'left',
						width: 250
					},

				// Navigation Button.
					navButton: {
						breakpoints: 'medium',
						height: '4em',
						html: '<span class="toggle" data-action="toggleLayer" data-args="navPanel"></span>',
						position: 'top-left',
						side: 'top',
						width: '6em'
					}

			}
		}
	});

	$(function() {

		var $body = $('body'),
			$window = $(window);

		// Disable animations/transitions until the page has loaded.
			$body.addClass('is-loading');

			$window.on('load', function() {

				window.setTimeout(function() {
					$body.removeClass('is-loading');
				}, 500);

			});

		// Docs.
			if ($body.hasClass('page-docs')) {

				var $sidebar = $('#sidebar');

				// Initialize prettify on load.
					$window.load(function() {
						prettyPrint();
					});

				// Initialize scrollzer.

					/* jquery.scrollzer v0.2 | (c) n33 | n33.co @n33co | MIT + GPLv2 */
					jQuery.scrollzer=function(e,t){var n=!1,r="object",i="clearTimeout",s="setTimeout",o="removeClass",u="scrollzer-locked",a="activeClassName",f=jQuery(window),l=jQuery(document);f.load(function(){var c,h,p,d,v,m,g,y,b,w,E=jQuery.extend({activeClassName:"active",suffix:"-link",pad:50,firstHack:n,lastHack:n},t),S=[],x=jQuery();for(c in e){p=jQuery("#"+e[c]),d=jQuery("#"+e[c]+E.suffix);if(p.length<1||d.length<1)continue;h={},h.link=d,h[r]=p,S[e[c]]=h,x=x.add(d)}y=function(){var e;for(c in S)e=S[c],e.start=Math.ceil(e[r].offset().top)-E.pad,e.end=e.start+Math.ceil(e[r].innerHeight());f.trigger("scroll")},f.resize(function(){window[i](g),g=window[s](y,250)}),w=function(){x[o](u)},f.scroll(function(){var e=0,t=n;v=f.scrollTop(),window[i](b),b=window[s](w,250);for(c in S)c!=m&&v>=S[c].start&&v<=S[c].end&&(m=c,t=!0),e++;E.lastHack&&v+f.height()>=l.height()&&(m=c,t=!0),t&&!x.hasClass(u)&&(x[o](E[a]),S[m].link.addClass(E[a]))}),f.trigger("resize")})};

					var ids = [];

					$sidebar.find('a').each(function() {

						var href = $(this).attr('href');

						if (href[0] != '#')
							return;

						ids.push(href.substring(1));

					});

					$.scrollzer(ids, { pad: 100, lastHack: true });

			}

	});

})(jQuery);