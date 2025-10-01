<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BorrowRecord;
use Illuminate\Http\Request;

class BorrowRecordController extends Controller
{
    public function index()
    {
        return response()->json(BorrowRecord::with(['book', 'member'])->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'borrow_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:borrow_date',
            'return_date' => 'nullable|date',
        ]);

        $borrowRecord = BorrowRecord::create($validated);

        return response()->json($borrowRecord, 201);
    }

    public function show(string $id)
    {
        $borrowRecord = BorrowRecord::with(['book', 'member'])->find($id);

        if (!$borrowRecord) {
            return response()->json(['message' => 'Borrow record not found'], 404);
        }

        return response()->json($borrowRecord);
    }

    public function update(Request $request, string $id)
    {
        $borrowRecord = BorrowRecord::find($id);

        if (!$borrowRecord) {
            return response()->json(['message' => 'Borrow record not found'], 404);
        }

        $validated = $request->validate([
            'return_date' => 'nullable|date',
        ]);

        $borrowRecord->update($validated);

        return response()->json($borrowRecord);
    }

    public function destroy(string $id)
    {
        $borrowRecord = BorrowRecord::find($id);

        if (!$borrowRecord) {
            return response()->json(['message' => 'Borrow record not found'], 404);
        }

        $borrowRecord->delete();

        return response()->json(['message' => 'Borrow record deleted successfully']);
    }
}
