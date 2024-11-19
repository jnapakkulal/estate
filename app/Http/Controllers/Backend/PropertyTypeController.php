<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\PropertyType;
use App\Models\User;
use App\Models\Amenities;
use PhpParser\Node\Stmt\PropertyProperty;

class PropertyTypeController extends Controller
{
    public function AllType()
    {
        return view('backend.type.all_type');
    }


    public function FetchPropertyTypes(Request $request)
    {
        // Get the required DataTable parameters
        $start = $request->input('start', 0); // Offset
        $length = $request->input('length', 10); // Limit
        $searchValue = $request->input('search.value', ''); // Search value
        $orderColumnIndex = $request->input('order.0.column', 0); // Column index to order by
        $orderDir = $request->input('order.0.dir', 'asc'); // Order direction (asc or desc)

        // Map column index to database column names
        $columns = ['id', 'type_name', 'type_icon'];
        $orderColumn = $columns[$orderColumnIndex] ?? 'id';

        // Build the query
        $query = PropertyType::query();

        // Apply search filter if a search term is provided
        if (!empty($searchValue)) {
            $query->where('type_name', 'like', '%' . $searchValue . '%')
                ->orWhere('type_icon', 'like', '%' . $searchValue . '%');
        }

        // Get total count before applying limit
        $totalRecords = $query->count();

        // Apply ordering and limit the results
        $types = $query->orderBy($orderColumn, $orderDir)
            ->skip($start)
            ->take($length)
            ->get();

        // Format the data for DataTable consumption
        $data = $types->map(function ($item, $key) use ($start) {
            return [
                'row_number' => $start + $key + 1, // Calculate row number based on start + index
                'id' => $item->id,
                'type_name' => $item->type_name,
                'type_icon' => $item->type_icon,
                'action' => '<a href="' . route('edit.type', $item->id) . '" class="btn btn-inverse-warning">Edit</a>
                             <a href="' . route('delete.type', $item->id) . '" class="btn btn-inverse-danger">Delete</a>'
            ];
        });

        // Return the JSON response with the data and the necessary metadata
        return response()->json([
            'draw' => intval($request->input('draw')), // Pass the draw parameter back as received
            'recordsTotal' => $totalRecords, // Total records count (without filtering)
            'recordsFiltered' => $totalRecords, // Total records count (with filtering)
            'data' => $data // The data for the current page
        ]);
    }




    public function AddType()
    {
        return view('backend.type.add_type');
    }
    public function StoreType(Request $request)
    {
        $request->validate([
            'type_name' => 'required|unique:property_types|max:200',
            'type_icon' => 'required'
        ]);

        PropertyType::insert([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,

        ]);
        $notification = array(
            'message' => 'property Type Created Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);
    }
    public function EditType($id)
    {
        $types = propertyType::findOrFail($id);
        return view('backend.type.edit_type', compact('types'));
    }
    public function UpdateType(Request $request)
    {
        $pid = $request->id;

        PropertyType::findOrFail($pid)->update([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,

        ]);
        $notification = array(
            'message' => 'property Type Updated Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);
    }
    public function DeleteType($id)
    {
        PropertyType::findOrFail($id)->delete();
        $notification = array(
            'message' => 'property Type deleted Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    //chunking of the data

    /* public function processPropertyTypes()
     {
         DB::table('property_types')->chunk(100, function ($propertyTypes) {
             foreach ($propertyTypes as $propertyType) {
                 Log::info('Processing property type:', [
                     'type_name' => $propertyType->type_name,
                     'type_icon' => $propertyType->type_icon,
                 ]);

             }
         });
     }*/


    /*public function paginateCandidates(Request $request)
    {
        $perPage = 10; // Number of items per page
        $page = $request->page ?? 1;

        $candidates = PropertyType::paginate($perPage, ['*'], 'page', $page);

        return response()->json($candidates);
    }*/

    /* public function fetchCandidates(Request $request)
     {
         $types = PropertyType::paginate(10); // Fetch 10 entries per page
         return response()->json($types);
     }*/







    ///u can also create a new controller for amenities so that u can write in that
    ////for Amenities all method
    public function AllAmenitie()
    {
        $amenities = Amenities::latest()->get();
        return view('backend.amenities.all_amenities', compact('amenities'));
    }

    public function AddAmenities()
    {
        return view('backend.amenities.add_amenities');
    }

    public function StoreAmenities(Request $request)
    {


        Amenities::insert([
            'amenities_name' => $request->amenities_name,

        ]);
        $notification = array(
            'message' => 'Amenities Created Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.amenitie')->with($notification);
    }
    public function EditAmenities($id)
    {
        $amenities = Amenities::findOrFail($id);
        return view('backend.amenities.edit_amenities', compact('amenities'));
    }
    public function UpdateAmenities(Request $request)
    {
        $aid = $request->id;

        Amenities::findOrFail($aid)->update([
            'amenities_name' => $request->amenities_name,

        ]);
        $notification = array(
            'message' => 'Amenities Updated Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.amenitie')->with($notification);
    }

    public function DeleteAmenities($id)
    {
        Amenities::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Amenities deleted Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

}
