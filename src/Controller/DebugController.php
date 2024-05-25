<?php

namespace App\Controller;

use App\Service\ColumnIdService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/debug', name: 'app_debug')]
class DebugController extends AbstractController
{

    #[Route('/number-to-title/{id}', name: 'debug_number_to_title', methods: ['GET'])]
    public function numberToTitle(ColumnIdService $columnIdService, $id): JsonResponse
    {
        $value = $columnIdService->numberToTitle($id);
        return $this->json([
            $id => $value
        ]);
    }

    #[Route('/title-to-number/{id}', name: 'debug_title_to_number', methods: ['GET'])]
    public function titleToNumber(ColumnIdService $columnIdService, $id): JsonResponse
    {
        $value = $columnIdService->titleToNumber($id);
        return $this->json([
            $id => $value
        ]);
    }
}
