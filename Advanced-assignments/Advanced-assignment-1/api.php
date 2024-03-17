<?php

require './vendor/autoload.php';

/**
 * A Class to fetch data from the API.
 */
class API {
  // URL of the api.
  public $api_url = 'https://www.innoraft.com/jsonapi/node/services';

  // URL of the domain.
  private $domain = 'https://www.innoraft.com';

  // Client to request data from API.
  public $client;

  /**
   * Constructor to initialize the client.
   */
  function __construct() {
    // Initialize the client with GuzzleHttp\Client object.
    $this->client = new GuzzleHttp\Client();
  }

  /**
   * Function to perform API call on the URL.
   *
   * @return mixed
   *   Returns a JSON like PHP array.
   */
  private function mainCall() {
    $response = $this->client->get($this->api_url);
    $response = json_decode($response->getBody(), true);
    return $response;
  }

  /**
   * Function to fetch header and the list.
   *
   * @param integer $index
   *   Index of the heading and list.
   *
   * @return array
   *   Returns an array containing the header and the list.
   */
  function getText(int $index) {
    $response = $this->mainCall();
    $heading = $this->client->get($response['data'][$index]['links']['self']['href']);
    $heading = json_decode($heading->getBody(), true);
    $head = $heading['data']['attributes']['field_secondary_title']['value'];
    $li = $heading['data']['attributes']['field_services']['value'];
    return [$head, $li];
  }

  /**
   * Function to fetch icons at each index.
   *
   * @param integer $index
   *   Index of the icons.
   *
   * @return array
   *   Returns an array containing icon paths.
   */
  function getIcons(int $index) {
    $response = $this->mainCall();
    $icons = [];
    $icon = $this->client->get(
      $response['data'][$index]['relationships']['field_service_icon']['links']['related']['href']
    );
    $icon = json_decode($icon->getBody(), true);
    $icon = $icon['data'];
    for ($i = 0; $i < count($icon); $i++) {
      $temp_icon = $this->client->get(
        $icon[$i]['relationships']['thumbnail']['links']['related']['href']
      );
      $temp_icon = json_decode($temp_icon->getBody(), true);
      array_push($icons, $this->domain . $temp_icon['data']['attributes']['uri']['url']);
    }
    return $icons;
  }

  /**
   * Function to fetch image at each index.
   *
   * @param integer $index
   *   Index of the image.
   *
   * @return string
   *   Returns the source path of the image.
   */
  function getImage(int $index) {
    $response = $this->mainCall();
    $image = $this->client->get(
      $response['data'][$index]['relationships']['field_image']['links']['related']['href']
    );
    $image = json_decode($image->getBody(), true);
    $image = $this->domain . $image['data']['attributes']['uri']['url'];
    return $image;
  }
}
