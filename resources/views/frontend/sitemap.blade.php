<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
 
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  	
  	<url>
  		<loc>https://companydomain.com</loc>
        <priority>1.0</priority>
    </url>
    <url>
  		<loc>https://companydomain.com/projects</loc>
    </url>

    <url>
  		<loc>https://companydomain.com/categories</loc>
    </url>

    <url>
  		<loc>https://companydomain.com/news</loc>
    </url>

    @foreach($categories as $category)
    	<url>
            <loc>https://companydomain.com/{{ $category->slug }}</loc>
        </url>
    @endforeach

    @foreach($projects as $project)
    	<url>
            <loc>https://companydomain.com/{{ $project->slug }}</loc>
            <lastmod>{{ $project->updated_at }}</lastmod>
            <changefreq>weekly</changefreq>
        </url>
    @endforeach


    @foreach($albums as $album)
    	<url>
            <loc>https://companydomain.com/{{ $album->slug }}</loc>
            <lastmod>{{ $album->updated_at }}</lastmod>
            <changefreq>weekly</changefreq>   
        </url>
    @endforeach

    @foreach($newslist as $news)
    	<url>
            <loc>https://companydomain.com/{{ $news->slug }}</loc>
            <lastmod>{{ $news->updated_at }}</lastmod>
            <changefreq>weekly</changefreq>   
        </url>
    @endforeach
 
</sitemapindex>