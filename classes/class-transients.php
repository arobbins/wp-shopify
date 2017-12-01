<?php

namespace WPS;

/*

Class Transients

*/
class Transients {

  protected static $instantiated = null;


  /*

  Initialize the class and set its properties.

  */
  public function __construct() {

  }


  /*

	Creates a new class if one hasn't already been created.
	Ensures only one instance is used.

	*/
	public static function instance() {

		if (is_null(self::$instantiated)) {
			self::$instantiated = new self();
		}

		return self::$instantiated;

	}


  /*

  check_rewrite_rules

  */
  public static function check_rewrite_rules() {

    if (get_transient('wps_settings_updated') !== false) {

      flush_rewrite_rules();
      delete_transient('wps_settings_updated');

    }

  }


  /*

  Check Money Format

  */
  public static function check_money_format() {

    if (get_transient('wps_money_format_updated') !== false) {
      delete_transient('wps_money_format_updated');
    }

  }


  /*

  Check Money Format

  */
  public static function check_money_with_currency_format() {

    if (get_transient('wps_money_with_currency_format_updated') !== false) {
      delete_transient('wps_money_with_currency_format_updated');
    }

  }


  /*

  Delete cached prices

  */
  public static function delete_cached_prices() {

    global $wpdb;

    $results = $wpdb->query("DELETE FROM $wpdb->options WHERE `option_name` LIKE '%\_transient\_wps\_product\_price\_id\_%'");

    if ($results === false) {
      return new \WP_Error('error', esc_html__('Warning: Unable to delete cached product prices.', 'wp-shopify'));

    } else {
      return true;
    }

  }


  /*

  Delete entire cache

  */
  public static function delete_all_cache() {

    global $wpdb;

    $results = $wpdb->query("DELETE FROM $wpdb->options WHERE `option_name` LIKE '%\_transient\_wps\_%'");

    if ($results === false) {
      return new \WP_Error('error', esc_html__('Warning: Unable to delete cache, please try again.', 'wp-shopify'));

    } else {
      return true;
    }

  }


  /*

  Delete cached variants

  */
  public static function delete_cached_variants() {

    global $wpdb;

    $results = $wpdb->query("DELETE FROM $wpdb->options WHERE `option_name` LIKE '%\_transient\_wps\_product\_with\_variants\_%'");

    if ($results === false) {
      return new \WP_Error('error', esc_html__('Warning: Unable to delete cached variants.', 'wp-shopify'));

    } else {
      return true;
    }

  }


  /*

  Delete cached settings

  */
  public static function delete_cached_settings() {

    global $wpdb;

    $results = $wpdb->query("DELETE FROM $wpdb->options WHERE `option_name` LIKE '%\_transient\_wps\_settings\_%' OR `option_name` LIKE '%\_transient\_wps\_table\_single\_row\_%'");

    if ($results === false) {
      return new \WP_Error('error', esc_html__('Warning: Unable to delete cached settings.', 'wp-shopify'));

    } else {
      return true;
    }

  }


  /*

  Delete cached product queries

  */
  public static function delete_cached_product_queries() {

    global $wpdb;

    $results = $wpdb->query("DELETE FROM $wpdb->options WHERE `option_name` LIKE '%\_transient\_wps\_products\_query\_hash\_cache\_%'");

    if ($results === false) {
      return new \WP_Error('error', esc_html__('Warning: Unable to delete cached product queries.', 'wp-shopify'));

    } else {
      return true;
    }

  }


  /*

  Delete cached single product options / variants

  */
  public static function delete_cached_product_single() {

    global $wpdb;

    $results = $wpdb->query("DELETE FROM $wpdb->options WHERE `option_name` LIKE '%\_transient\_wps\_product\_single\_%'");

    if ($results === false) {
      return new \WP_Error('error', esc_html__('Warning: Unable to delete cached single product.', 'wp-shopify'));

    } else {
      return true;
    }

  }


  /*

  Delete cached collection queries

  */
  public static function delete_cached_collection_queries() {

    global $wpdb;

    $results = $wpdb->query("DELETE FROM $wpdb->options WHERE `option_name` LIKE '%\_transient\_wps\_collections\_query\_hash\_cache\_%'");

    if ($results === false) {
      return new \WP_Error('error', esc_html__('Warning: Unable to delete cached collection queries.', 'wp-shopify'));

    } else {
      return true;
    }

  }


  /*

  Delete cached connection

  */
  public static function delete_cached_connection() {

    // global $wpdb;
    //
    // $string = '%\_transient\_wps\_table\_single\_row\_' . $wpdb->prefix . 'wps\_settings\_connection\_%';
    //
    // $results = $wpdb->query("DELETE FROM $wpdb->options WHERE `option_name` LIKE $string");
    //
    // return $results;

  }


  /*

  Delete Transient

  */
  public static function delete($transientName) {
    return delete_transient($transientName);
  }


  /*

  Set Transient

  */
  public static function set($transientName, $value, $time) {
    return set_transient($transientName, $value, $time);
  }


  /*

  Get Transient

  */
  public static function get($transientName) {
    return get_transient($transientName);
  }


  /*

  Delete cached settings

  */
  public static function delete_cached_connections() {

    global $wpdb;

    $results = $wpdb->query("DELETE FROM $wpdb->options WHERE `option_name` LIKE '%\_transient\_wps\_connection\_%'");

    if ($results === false) {
      return new \WP_Error('error', esc_html__('Warning: Unable to delete cached connection.', 'wp-shopify'));

    } else {
      return true;
    }

  }


}
