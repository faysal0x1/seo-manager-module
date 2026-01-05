<?php

namespace App\Modules\SeoManager\Http\Controllers;

use App\Helpers\QueryBuilderHelper;
use App\Http\Controllers\Controller;
use App\Modules\SeoManager\Http\Requests\SeoEntryRequest;
use App\Modules\SeoManager\Repositories\SeoEntryRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SeoEntryController extends Controller
{
    public function __construct(
        private readonly SeoEntryRepository $seoEntries
    ) {
    }

    public function index(Request $request): Response
    {
        $entries = $this->seoEntries->paginate($request);

        return Inertia::render('seomanager/index', [
            'entries' => $entries,
            'filters' => QueryBuilderHelper::filters($request),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('seomanager/create');
    }

    public function store(SeoEntryRequest $request): RedirectResponse
    {
        $this->seoEntries->create($request->validated());

        return success_route('seo-manager.index', 'SEO entry created successfully.');
    }

    public function edit(int $id): Response
    {
        $entry = $this->seoEntries->find($id);

        if (! $entry) {
            abort(404);
        }

        return Inertia::render('seomanager/edit', [
            'entry' => $entry,
        ]);
    }

    public function update(SeoEntryRequest $request, int $id): RedirectResponse
    {
        $this->seoEntries->update($request->validated(), $id);

        return success_route('seo-manager.index', 'SEO entry updated successfully.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->seoEntries->delete($id);

        return success_route('seo-manager.index', 'SEO entry deleted successfully.');
    }
}


