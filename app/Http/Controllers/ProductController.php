<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::with(['category', 'service.room'])->paginate(15);

        foreach ($products->items() as &$product) {
            $cheapestRoom = null;
            $earliestDeparture = null;
            $latestArrival = null;

            foreach ($product->service as $service) {
                if (isset($service->room) && !empty($service->room)) {
                    $serviceCheapestRoom = collect($service->room)->sortBy('price')->first();

                    if ($cheapestRoom === null || (isset($serviceCheapestRoom['price']) && $serviceCheapestRoom['price'] < $cheapestRoom['price'])) {
                        $cheapestRoom = $serviceCheapestRoom;
                    }
                }

                if ($service->departure_date) {
                    if ($earliestDeparture === null || strtotime($service->departure_date) < strtotime($earliestDeparture)) {
                        $earliestDeparture = $service->departure_date;
                    }
                }

                if ($service->arrival_date) {
                    if ($latestArrival === null || strtotime($service->arrival_date) > strtotime($latestArrival)) {
                        $latestArrival = $service->arrival_date;
                    }
                }
            }

            $product->cheapest_room = $cheapestRoom;
            $product->earliest_departure = $earliestDeparture;
            $product->latest_arrival = $latestArrival;

            unset($product->service); 

            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => $products
            ], 200);
        }   
    }

    public function searchProduct(Request $request) {
        $products = Product::with(['category', 'service.room'])
            ->when ($request->category_id, function ($query) use ($request) {
                return $query->where('category_id', $request->category_id);
            })
            ->when($request->destination, function ($query) use ($request) {
                return $query->where('name', $request->destination);
            })
            ->when($request->departure, function ($query) use ($request) {
                return $query->whereHas('service', function ($serviceQuery) use ($request) {
                    $serviceQuery->where('departure_place', $request->departure);
                });
            })
            ->when($request->price, function ($query) use ($request) {
                return $query->whereHas('service.room', function ($roomQuery) use ($request) {
                    $roomQuery->where('price', '<=', $request->price);
                });
            })
            ->when($request->start_date, function ($query) use ($request) {
                return $query->whereHas('service', function ($serviceQuery) use ($request) {
                    $serviceQuery->where('departure_date', '>=', $request->start_date);
                });
            })
            ->when($request->end_date, function ($query) use ($request) {
                return $query->whereHas('service', function ($serviceQuery) use ($request) {
                    $serviceQuery->where('arrival_date', '<=', $request->end_date);
                });
            })
            
            ->paginate(15);

        foreach ($products->items() as &$product) {
            $cheapestRoom = null;
            $earliestDeparture = null;
            $latestArrival = null;

            foreach ($product->service as $service) {
                if (isset($service->room) && !empty($service->room)) {
                    $serviceCheapestRoom = collect($service->room)->sortBy('price')->first();

                    if ($cheapestRoom === null || (isset($serviceCheapestRoom['price']) && $serviceCheapestRoom['price'] < $cheapestRoom['price'])) {
                        $cheapestRoom = $serviceCheapestRoom;
                    }
                }

                if ($service->departure_date) {
                    if ($earliestDeparture === null || strtotime($service->departure_date) < strtotime($earliestDeparture)) {
                        $earliestDeparture = $service->departure_date;
                    }
                }

                if ($service->arrival_date) {
                    if ($latestArrival === null || strtotime($service->arrival_date) > strtotime($latestArrival)) {
                        $latestArrival = $service->arrival_date;
                    }
                }
            }

            $product->cheapest_room = $cheapestRoom;
            $product->earliest_departure = $earliestDeparture;
            $product->latest_arrival = $latestArrival;

            unset($product->service); 

            
        }  
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $products
        ], 200); 
    }

    public function departurePlace() {
        $departurePlaces = Service::select('departure_place as name')
            ->distinct()
            ->get();
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $departurePlaces
        ], 200);
    }

    public function destination() {
        $destinations = Product::select('name')
            ->distinct()
            ->get();
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $destinations
        ], 200);
    }

    public function productByCategory($id) {
         $products = Product::with(['category', 'service.room'])
            ->where('category_id', $id)
            ->paginate(15);

        foreach ($products->items() as &$product) {
            $cheapestRoom = null;
            $earliestDeparture = null;
            $latestArrival = null;

            foreach ($product->service as $service) {
                if (isset($service->room) && !empty($service->room)) {
                    $serviceCheapestRoom = collect($service->room)->sortBy('price')->first();

                    if ($cheapestRoom === null || (isset($serviceCheapestRoom['price']) && $serviceCheapestRoom['price'] < $cheapestRoom['price'])) {
                        $cheapestRoom = $serviceCheapestRoom;
                    }
                }

                if ($service->departure_date) {
                    if ($earliestDeparture === null || strtotime($service->departure_date) < strtotime($earliestDeparture)) {
                        $earliestDeparture = $service->departure_date;
                    }
                }

                if ($service->arrival_date) {
                    if ($latestArrival === null || strtotime($service->arrival_date) > strtotime($latestArrival)) {
                        $latestArrival = $service->arrival_date;
                    }
                }
            }

            $product->cheapest_room = $cheapestRoom;
            $product->earliest_departure = $earliestDeparture;
            $product->latest_arrival = $latestArrival;

            unset($product->service); 

            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => $products
            ], 200);
        }
    }
}