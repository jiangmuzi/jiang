<?php
/**
 * 响应式单栏主题
 * 
 * @package Jiang
 * @author 绛木子
 * @version 1.0
 * @link http://lixianhua.com
 * @
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<?php $this->need('controls.php'); ?>
<?php if (!empty($this->options->blogBanner)): ?>
	<?php $this->request->setParam('cid',$this->options->blogBanner); $this->widget('Widget_Archive@banner','type=post')->to($blogBanner);$this->request->setParam('cid','');?>
	<div class="blog-banner">
		<?php $thumb = thumbnail($blogBanner,'970x420',true);if(!$thumb):?>
			<?php $thumb = $this->options->themeUrl.'/img/post_banner.jpg';?>
		<?php endif;?>
		<div class="blog-banner-img" style="background-image:url('<?php echo $thumb;?>');"></div>
		<div class="blog-banner-text">
			<div class="post-category"><?php $blogBanner->category(','); ?></div>
			<h2><a href="<?php $blogBanner->permalink() ?>"><?php $blogBanner->title() ?></a></h2>
			<ul class="post-meta">
				<li><a href="#comments"><i class="fa fa-comments"></i> <?php $blogBanner->commentsNum('%d'); ?></a></li>
				<li><a><i class="fa fa-eye"></i> <?php $blogBanner->viewsNum(); ?></a></li>
				<li><a class="btn-like" data-cid="<?php $blogBanner->cid(); ?>"><i class="fa fa-thumbs-up"></i> <span class="post-like-num"><?php $blogBanner->likesNum(); ?></span></a></li>
				<li><a><i class="fa fa-clock-o"></i> <?php $blogBanner->date('Y/m/d H:i:s'); ?></a></li>
			</ul>
		</div>
	</div>
<?php endif; ?>
<div id="main" role="main">
	<?php while($this->next()): ?>
        <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
			<?php $thumb = thumbnail($this,null,true);if($thumb):?>
			<a href="<?php $this->permalink() ?>" class="post-thumb" style="background-image:url('<?php echo $thumb;?>');"></a>
			<div class="post-body">
			<?php else:?>
			<div class="post-body post-text" style="background-color:#<?php echo randColor();?>">
			<?php endif;?>
				<div class="post-category"><?php $this->category(','); ?></div>
				<h2 class="post-title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
				<div class="post-content" itemprop="articleBody">
					<?php $this->description(); ?>
				</div>
				<ul class="post-meta">
					<li><a href="<?php $this->permalink() ?>#comments"><i class="fa fa-comments"></i> <?php $this->commentsNum('%d'); ?></a></li>
					<li><a><i class="fa fa-eye"></i> <?php $this->viewsNum(); ?></a></li>
					<li><a class="btn-like" data-cid="<?php $this->cid(); ?>"><i class="fa fa-thumbs-up"></i> <span class="post-like-num"><?php $this->likesNum(); ?></span></a></li>
				</ul>
			</div>
        </article>
	<?php endwhile; ?>
	<ul class="post-foot box">
        <li class="prev" title="<?php _e('上一页');?>"><?php $this->pageLink('<i class="fa fa-long-arrow-left"></i>','prev');?></li>
        <li class="num"><?php echo $this->getCurrentPage();?> of <?php echo $this->getTotalPage();?></li>
        <li class="next" title="<?php _e('下一页');?>"><?php $this->pageLink('<i class="fa fa-long-arrow-right"></i>','next');?></li>
    </ul>
</div><!-- end #main-->
<?php $this->need('footer.php'); ?>
