<?php

namespace App\Service;

use Exception;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PictureService
{
  private $param;

  public function __construct(ParameterBagInterface $param)
  {
    $this->param = $param;
  }

  public function add(UploadedFile $picture, ?string $folder = '', ?int $width = 250, ?int $height = 350)
  {
    //On donne un nouveau nom à l'image
    $fichier = md5(uniqid(rand(), true)) . 'jpg';

    //on récupère les infos de l'image
    $picture_infos = getimagesize($picture);

    if ($picture_infos === false) {
      throw new Exception('Format d\'image incorect');

      //on verifie le format de l'image
      switch ($picture_infos['mime']) {
        case 'image/png':
          $picture_souce = imagecreatefrompng($picture);
          break;
        case 'image/jpeg':
          $picture_souce = imagecreatefromjpeg($picture);
          break;
        case 'image/webp':
          $picture_souce = imagecreatefromwebp($picture);
          break;
        default:
          throw new Exception('Format d\'image incorect');
      }

      //On recadre l'image
      $imageWidth = $picture_infos[0];
      $imageHeight = $picture_infos[1];

      //On vérifie l'orientation
      
    }
  }
}