<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Axiom\Client as AxiomClient;

class UserlistController extends Controller
{
    public function index(Request $request)
    {
        $axiom = new AxiomClient();

        // Pagination parameters
        $page = $request->query('page', 1);
        $limit = $request->query('limit', 10);

        // Sorting parameters
        $sortBy = $request->query('sort_by', 'firstName');
        $sortOrder = $request->query('sort_order', 'asc');

        try {
            $response = $axiom->get('https://dummyapi.io/data/api/user', [
                'query' => [
                    'page' => $page,
                    'limit' => $limit,
                    'sortBy' => $sortBy,
                    'order' => $sortOrder,
                ],
                'headers' => [
                    'app-id' => 'your-app-id', // Replace 'your-app-id' with your actual app ID
                ],
            ]);

            $users = json_decode($response->getBody());

            return view('userlist.index', compact('users'));
        } catch (\Exception $e) {
            // Handle exceptions
            return view('error');
        }
    }
}
