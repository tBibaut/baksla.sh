<?php

declare(strict_types=1);

namespace App\Blog\Infrastructure\Symfony\HttpKernel\StaticSiteGeneration;

use App\Blog\Domain\Repository\ArticlePreviewRepository;
use Symfony\Component\Routing\StaticSiteGeneration\ParamsProviderInterface;

class ViewArticleParamsProvider implements ParamsProviderInterface
{
    public function __construct(
        private ArticlePreviewRepository $articlePreviewRepository,
    ) {
    }

    public function provideParams(): iterable
    {
        $articles = $this->articlePreviewRepository->findAll();
        foreach ($articles as $article) {
            yield ['id' => $article->id];
        }
    }
}
