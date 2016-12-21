<?php
/**
 * Plugin Name: Hello Donny
 * Plugin URI:  http://wordpress.org/plugins/hello-donny/
 * Description: Donny was a good bowler, and a good man. He was one of us. He was a man who loved the outdoors... and bowling, and as a surfer he explored the beaches of Southern California, from La Jolla to Leo Carrillo and... up to... Pismo. He died, like so many young men of his generation, he died before his time.
 * Author:      John James Jacoby
 * Author URI:  https://jjj.blog
 * Version:     1.0.0
*/

class Hello_Donny {

	/**
	 * Array of things Donny said
	 *
	 * @since 1.0.0
	 *
	 * @var array
	 */
	public $quotes = array(
		//"What the fuck is he talking about?",
		//"Are these the Nazis, Walter?",
		//"They were Nazis, Dude?",
		//"What's a... pederast, Walter?",
		"His name's Lebowski? That's your name, Dude!",
		"What's wrong with Walter, Dude?",
		"I'm throwing rocks tonight.",
		"Mark it, Dude.",
		"Phone's ringing, Dude.",
		"What do you need that for, Dude?",
		"They posted the next round for the tournament.",
		"Burkhalter.",
		"They already posted it.",
		"How come you don't roll on Saturday, Walter?",
		"What's that?",
		"Sheesh.",
		"He peed on the Dude's rug.",
		"And this guy peed on it.",
		"Are they gonna hurt us, Walter?",
		"I am the walrus.",
		"Those are good burgers, Walter.",
		"What?",
		"I was bowling.",
		"Yeah, Walter, what's your point?",
		"Who's in pajamas Walter?",
		"Who's got your undies, Walter?",
		"Where you going, Dude?",
		"Hey, I got eighteen dollars.",
	);

	/**
	 * Main constructor
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->add_actions();
	}

	/**
	 * Add public class actions to admin actions
	 *
	 * @since 1.0.0
	 */
	private function add_actions() {
		add_action( 'admin_notices', array( $this, 'admin_notices' ) );
		add_action( 'admin_head',    array( $this, 'admin_head'    ) );
	}

	/**
	 * Return a random quote, texturized
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public function get_random_quote() {
		return wptexturize( $this->quotes[ mt_rand( 0, count( $this->quotes ) - 1 ) ] );
	}

	/**
	 * Output a wrapper element and a random quote
	 *
	 * @since 1.0.0
	 */
	public function admin_notices() {
		echo '<p class="hello-donny">' . $this->get_random_quote() . '</p>';
	}

	/**
	 * Output styling for quote
	 *
	 * @since 1.0.0
	 */
	public function admin_head() {

		// LTR/RTL support
		$direction = is_rtl()
			? 'left'
			: 'right';

		echo "
		<style type='text/css'>
			.hello-donny {
				float: {$direction};
				padding-{$direction}: 5px;
				padding-top: 6px;
				margin: 0;
				font-size: 11px;
				color: #888;
			}
		</style>
		";
	}
}

new Hello_Donny();
