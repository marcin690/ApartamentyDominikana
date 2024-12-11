<div class="space overflow-hidden">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="title-area text-center">
                    <span class="sub-title">FAQ</span>
                    <h2 class="sec-title text-theme"><?php the_title() ?></h2>
                    <p class="sec-text text-theme"><?php the_sub_field('opis_1') ?></p>
                </div>

                <div class="accordion" id="faqAccordion">
                    <?php if (have_rows('lista_elementow')): ?>
                        <?php while (have_rows('lista_elementow')): the_row(); ?>
                            <div class="accordion-card">
                                <div class="accordion-header" id="collapse-item-<?php echo get_row_index(); ?>">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo get_row_index(); ?>" aria-expanded="false" aria-controls="collapse-<?php echo get_row_index(); ?>">
                                        <?php the_sub_field('element'); ?>
                                    </button>
                                </div>
                                <div id="collapse-<?php echo get_row_index(); ?>" class="accordion-collapse collapse" aria-labelledby="collapse-item-<?php echo get_row_index(); ?>" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text"><?php the_sub_field('odpowiedz'); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>


            </div>
        </div>
    </div>
</div>