<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    // Public FAQ page
    public function index()
    {
        $faqs = Faq::orderBy('order')->get();
        return view('faq.index', compact('faqs'));
    }

    // Admin: List all FAQs
    public function adminIndex()
    {
        $faqs = Faq::orderBy('order')->get();
        return view('admin.faq.index', compact('faqs'));
    }

    // Admin: Show create form
    public function create()
    {
        return view('admin.faq.create');
    }

    // Admin: Store new FAQ
    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        Faq::create($validated);
        return redirect('/admin/faq')->with('success', 'FAQ created successfully!');
    }

    // Admin: Show edit form
    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.faq.edit', compact('faq'));
    }

    // Admin: Update FAQ
    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);
        
        $validated = $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        $faq->update($validated);
        return redirect('/admin/faq')->with('success', 'FAQ updated successfully!');
    }

    // Admin: Delete FAQ
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return redirect()->back()->with('success', 'FAQ deleted successfully!');
    }
}
