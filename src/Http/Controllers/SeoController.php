<?php

namespace  Edguy\AdminPanel\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use SeoRequest;
use Helpers\ItemActionHelper;
use  Edguy\AdminPanel\Models\Seo;

class SeoController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $seos = Seo::query()->paginate(20);

        return view('AdminPanel::seos.index', compact('seos'));
    }

    /**
     * @return View
     */

    public function create(): View
    {
        return view('AdminPanel::seos.edit');
    }

    /**
     * @param Seo $seo
     * @return View
     */

    public function edit(Seo $seo): View
    {
        return view('AdminPanel::seos.edit', compact('seo'));
    }

    /**
     * @param SeoRequest $request
     * @return RedirectResponse
     */

    public function store(SeoRequest $request): RedirectResponse
    {
        $seo = new Seo();

        $seo = ItemActionHelper::createFromRequest($request, $seo);

        return redirect()->route('admin.seos.index', compact('seo'))
            ->with('success', 'Сео успiшно створено');
    }

    /**
     * @param SeoRequest $request
     * @param Seo $seo
     * @return RedirectResponse
     */

    public function update(SeoRequest $request, Seo $seo): RedirectResponse
    {
        $seo = ItemActionHelper::createFromRequest($request, $seo);

        return redirect()->route('admin.seos.index', compact('seo'))
            ->with('success', 'Сео успiшно оновлено');
    }

    /**
     * @param Seo $seo
     * @return RedirectResponse
     */

    public function destroy(Seo $seo): RedirectResponse
    {
        $seo->delete();

        return redirect()->route('admin.seos.index', 'admin.seo.index')
            ->with('success', 'Сео успiшно видалено');
    }
}
