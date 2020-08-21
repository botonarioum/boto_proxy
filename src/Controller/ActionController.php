<?php

namespace App\Controller;

use App\Botonarioum\Domain\Commands\Disable;
use App\Botonarioum\Domain\Commands\Enable;
use App\Entity\Bot;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ActionController extends AbstractController
{
    /**
     * @Route("/api/bot/connect/{bot_id}", name="enable_bot", methods={"POST"})
     * @ParamConverter("bot", options={"id" = "bot_id"})
     * @param Bot $bot
     * @param Enable $cmd
     * @return JsonResponse
     */
    public function enable(Bot $bot, Enable $cmd): JsonResponse
    {
        $cmd->execute($bot);

        return $this->json($bot->toArray());
    }

    /**
     * @Route("/api/bot/connect/{bot_id}", name="disable_bot", methods={"DELETE"})
     * @ParamConverter("bot", options={"id" = "bot_id"})
     * @param Bot $bot
     * @param Disable $cmd
     * @return JsonResponse
     */
    public function disable(Bot $bot, Disable $cmd): JsonResponse
    {
        $cmd->execute($bot);

        return $this->json($bot->toArray());
    }
}
