<?php namespace tests\Chess\Logic\Route;

use App\Chess\Logic\Route\KingRoute;
use App\Chess\Models\Coordinate;
use App\Chess\Models\Move;
use App\Chess\Pieces\King;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;
use tests\Chess\ChessTestCase;

class KingRouteTest extends ChessTestCase
{
    /**
     * @var KingRoute
     */
    private KingRoute $handler;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $this->handler = new KingRoute();
    }

    /**
     * A legal move returns true
     */
    public function test_Handler_ReturnsTrue(): void
    {
        $game = $this->getFreshGame();
        $coordinate = new Coordinate( Coordinates::C, Coordinates::FIVE );
        $piece = new King( Colours::WHITE, $coordinate );
        $from = new Coordinate( Coordinates::C, Coordinates::FIVE );
        $to = new Coordinate( Coordinates::C, Coordinates::SIX );
        $move = new Move( $game, $piece, $from, $to );

        $this->assertTrue( $this->handler->canMove( $move ) );
    }
}
