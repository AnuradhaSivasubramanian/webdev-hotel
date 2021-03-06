<?php

namespace App\Controller;

use App\Entity\Hotel;
use App\Service\CalculateYearsOpened;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    private const HOTEL_OPENED = 1969;
    /**
     *@Route("/")
     */
    public function home(LoggerInterface $logger, CalculateYearsOpened $years)

    {
        $logger->info('Homepage loaded');
        $year = $years->calculateYears(self::HOTEL_OPENED);

        $hotels = $this->getDoctrine()
            ->getRepository(Hotel::class)
            ->findAllBelowPrice(750);

        $images = [
            ['url' => 'images/hotel/intro_room.jpg', 'class' => ''],
            ['url' => 'images/hotel/intro_pool.jpg', 'class' => ''],
            ['url' => 'images/hotel/intro_dining.jpg', 'class' => ''],
            ['url' => 'images/hotel/intro_attractions.jpg', 'class' => ''],
            ['url' => 'images/hotel/intro_wedding.jpg', 'class' => 'hidesm']
        ];
        return $this->render('index.html.twig', ['year' => $year, 'images' => $images, 'hotels' => $hotels]);
    }
}