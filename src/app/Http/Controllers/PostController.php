<?php

namespace App\Http\Controllers;

use App\Bin;
use App\BinItem;
use App\Events\BinItemAdd;
use App\Exceptions\PostBinException;
use App\Http\Resources\BinItemResource;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\ServerBag;

class PostController extends Controller
{
    public function index(Request $request, $uuid)
    {
        $objBin = Bin::where('uuid', $uuid)->first();
        if (!is_object($objBin)) {
            throw new PostBinException('', PostBinException::NOT_FOUND);
        }
        $objBinItem = new BinItem();
        $objBinItem->header = serialize($request->header());
        $objBinItem->ip_address = $request->server->get('REMOTE_ADDR') ?? 'Unknown';
        $objBinItem->content = serialize($request->getContent());
        $objBinItem->method = $request->getMethod();
        $objBinItem->url = $request->getUri();

        $objBinItem = $objBin->binItems()->save($objBinItem);

        event(new BinItemAdd($objBinItem));

        return $uuid;
    }

    public function getBinListData($id)
    {
        $objUser = User::find($id);
        $bins = $objUser->bins;

        return response()->json(
            [
                "bins" => $bins
            ]
        );
    }

    public function getBinItems($id)
    {
        $objBin = Bin::where('uuid',$id)->first();
        if (!is_object($objBin)) {
            return response()->json([]);
        }

        $returnArr = [];
        $objBinItems = $objBin->binItems;

        foreach ($objBinItems as $objBinItem) {
            //$objBinItem->header = unserialize($objBinItem->header);
            $returnArr[] = new BinItemResource($objBinItem);
        }

        return response()->json(
            [
                "binItems" => $returnArr
            ]
        );
    }
}
