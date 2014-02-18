<div id="tag">
	<div class="title"><?=$post['title']?></div>
	<?php foreach((array)$post['list'] as $year => $month_list): ?>
	<div class="year_archive">
		<div class="year"><?=$year?></div>
		<?php foreach((array)$month_list as $month => $article_list): ?>
		<div class="month_archive">
			<div class="month"><?=$month?></div>
			<div class="list">
				<?php foreach((array)$article_list as $article): ?>
				<article>
					<span class="title">
						<?=linkTo("{$blog['base']}article/{$article['url']}", $article['title'])?>
					</span>
					<span class="archive">
						Archive:
						<?=linkTo("{$blog['base']}archive/{$article['year']}", $article['year'])?>
					</span>
					<span class="category">
						Category:
						<?=linkTo("{$blog['base']}category/{$article['category']}", $article['category'])?>
					</span>
					<span class="tag">
						Tag: 
						<?php foreach((array)$article['tag'] as $index => $tag): ?>
						<?php $article['tag'][$index] = linkTo("{$blog['base']}tag/$tag", $tag); ?>
						<?php endforeach; ?>
						<?=join($article['tag'], ', ')?>
					</span>
				</article>
				<?php endforeach; ?>
			</div>
		</div>
		<hr>
		<?php endforeach; ?>
	</div>
	<?php endforeach; ?>
	<div class="bar">
		<span class="new">
			<?=isset($post['bar']['p_path'])
				? linkTo($post['bar']['p_path'], "<< {$post['bar']['p_title']}") : ''?>
		</span>
		<span class="old">
			<?=isset($post['bar']['n_path'])
				? linkTo($post['bar']['n_path'], "{$post['bar']['n_title']} >>") : ''?>
		</span>
		<span class="count">
			<?="{$post['bar']['index']} / {$post['bar']['total']}"?>
		</span>
	</div>
</div>