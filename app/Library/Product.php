<?php

namespace App\Library;
use App\Models\RelateData;

class Product
{
    public static function productStr($products){
        $popular_products_str = '';
        foreach($products as $most_product){
            $dots = '';
            foreach($most_product->dot as $color){
                $dots .= '<span class="rounded-circle m-1" style="background-color: '.@$color->color.'; width: 0.75rem; height: 0.75rem;"></span>';
            }
            $calcute_list = $most_product->calcute_list;

            $old_price = '';
            if($calcute_list > 0 && $most_product->price != 0){
                $old_price = '<div class="old text-secondary">
						<del> '.number_format($most_product->old_price).' تومان </del>
						</div>
						<div class="off">
						<span class="badge bg-one text-dark fw-bolder">
							'.round($calcute_list).' %
						</span>
					</div>';
            }else{
                $old_price = ' <div class="d-flex" style="opacity: 0">
                        <div class="old text-secondary">
                            <del>  تومان </del>
                            </div>
                            <div class="off">
                            <span class="badge bg-one text-dark fw-bolder">
                                %
                            </span>
                        </div>
					</div>';
            }

            $x = $most_product->colors->count() > 0 ? '<p class="m-0"> در '.$most_product->colors->count() . ' '. $most_product->specification_title.'</p>': '';
            $y = $calcute_list > 0 && $most_product->price != 0 ? '<div class="sp-discount"><p class="m-0">تخفیف ویژه</p></div>' : '';
            $z = $most_product->colors->count() > 0 ? 'از ' : ' ';


            $popular_products_str .= '<div class="swiper-slide proItem">
                    <div class="card card-pro">
                        <div class="overlay-top">
                           '.$y.'
                        </div>
                        <a href="https://www.kajshop.com/pro/1291">
                            <div class="bxs">
                                   <figure class="w-100 mx-0 my-2"><div class="figure-inn">
                                    <img srcset="'.$most_product->pro_image.' 2x, '.$most_product->pro_image.' 1x" loading="lazy" src="'.$most_product->pro_image.'" alt="'.$most_product->title.'" class="swiper-lazy" width="100" height="100">
                            </div>
                            </figure>
                            <p class="text-dark h4">
				               '.$most_product->title.'
			                </p>
			                <div class="color d-flex justify-content-center align-items-center" style="height: 1.25rem;">
                                '.$dots.'
                            </div>

                            <div class="price">
                               '.$old_price.'
                            </div>

                            <p class="prc fw-bolder">
                                '.$z.'
                                '.number_format($most_product->price).'  تومان
                            </p>
                                <div class="colors d-flex align-items-center justify-content-center" style="height: 1.5rem;">
                                    '.$x.'
                                </div>
                            </div>
                        </a>
                    </div>
                </div>';



        }
        return $popular_products_str;
    }

}
