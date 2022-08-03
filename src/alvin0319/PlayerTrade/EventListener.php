<?php

declare(strict_types=1);

namespace alvin0319\PlayerTrade;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerQuitEvent;
use alvin0319\PlayerTrade\trade\TradeManager;

class EventListener implements Listener
{
	public function onPlayerQuit(PlayerQuitEvent $event): void
	{
		$player = $event->getPlayer();
		if (($session = TradeManager::getSessionByPlayer($player)) !== null) {
			$session->cancel(true, $session->isSender($player));
		}
	}
}
