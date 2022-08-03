# PlayerTrade
![Fork Logo](https://media.discordapp.net/attachments/973097510748966982/981141129560981504/PlayerTrade.gif?width=1416&height=503)
A PocketMine-MP plugin that implements trade like PC server! 

**Forked by MagicGames. Updated to PM4 and patched exploits. Will be supported as long as MagicGames is alive :)**

## Fork Changes
- Updated to PM4 ([@cosmicnebula200](https://github.com/cosmicnebula200/))
- Added a double confirmation system
- Fixed item duplication on complete (Plugins-PocketMineMP/PlayerTrade#2 & Plugins-PocketMineMP/PlayerTrade#3)
- Fixed rare occurrence of items not taken away from sender on complete
- Fixed duplication on close due to mismatched inventory
- Fixed synchronization problems causing inconsistency

# Features
* User-modifiable message
* Trade request expiration time can be set
* Clear design
* Developer API

# Commands
|command|description|
|---|---|
|/trade request <player>|Request a trade from the player.|
|/trade accept <player>|Accept the player's trade request.|
|/trade deny <player>|Decline the player's trade request.|

# Developer Docs
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