# PlayerTrade
![PlayerTrade](https://media.discordapp.net/attachments/973097510748966982/981141129560981504/PlayerTrade.gif?width=1416&height=503)

A PocketMine-MP plugin that implements trade like PC server! Lots of improvements from the original.

## Features
* User-modifiable message
* Trade request expiration time can be set
* Double confirmation trade
* Clear design
* Developer API

## Commands
|command|description|
|---|---|
|/trade request <player>|Request a trade from the player.|
|/trade accept <player>|Accept the player's trade request.|
|/trade deny <player>|Decline the player's trade request.|

## Fork Changes
* Fixed item duplication on complete (Plugins-PocketMineMP/PlayerTrade#2 & Plugins-PocketMineMP/PlayerTrade#3)
* Fixed rare occurrence of items not taken away from sender on complete
* Fixed duplication on close due to mismatched inventory
* Fixed synchronization problems causing inconsistency

## Developer Docs
`\alvin0319\PlayerTrade\event\TradeStartEvent`: Called when player starts trade. (You can cancel this event)
```php
public function onTradeStart(\alvin0319\PlayerTrade\event\TradeStartEvent $event) : void{
    $sender = $event->getSender();
    $receiver = $event->getReceiver();
    if(some condition...){
        $event->cancel();
    }
}
```

`\alvin0319\PlayerTrade\event\TradeEndEvent`: Called when player ends trade (You cannot cancel this event)
```php
public function onTradeEnd(\alvin0319\PlayerTrade\event\TradeEndEvent $event) : void{
    $sender = $event->getSender();
    $receiver = $event->getReceiver();
    switch($event->getReason()){
        case \alvin0319\PlayerTrade\event\TradeEndEvent::REASON_RECEIVER_CANCEL:
            // do something
            break;
        default:
            // do something
            break;
    }
}
```