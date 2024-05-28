<?php

namespace App\Controller;

use App\Service\ColumnIdService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/debug', name: 'app_debug')]
class DebugController extends AbstractController
{

    #[Route('/number-to-title/{id}', name: 'debug_number_to_title', methods: ['GET'])]
    public function numberToTitle(ColumnIdService $columnIdService, $id): JsonResponse
    {
        try {
            if (!is_numeric($id)) {
                throw new Exception('Parameter must be of type int');
            }
            $value = $columnIdService->numberToTitle($id);
        } catch (\Throwable $t) {
            return $this->json([
                'errorMessage' => $t->getMessage()
            ]);
        }
        return $this->json([
            $id => $value
        ]);
    }

    #[Route('/title-to-number/{id}', name: 'debug_title_to_number', methods: ['GET'])]
    public function titleToNumber(ColumnIdService $columnIdService, $id): JsonResponse
    {
        try {
            if (is_numeric($id)) {
                throw new Exception('Parameter must be of type string');
            }
            $value = $columnIdService->titleToNumber($id);
        } catch (\Throwable $t) {
            return $this->json([
                'errorMessage' => $t->getMessage()
            ]);
        }
        return $this->json([
            $id => $value
        ]);
    }
}
