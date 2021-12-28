<?php

class FooterCompanyData extends WP_Widget {

	/*
	 * Widgetを登録する
	 */
	function __construct() {
		parent::__construct(
			'footer-company-data',
			'会社情報（フッター）',
		);
	}

	/*
	 * 表側の Widget を出力する
	 *
	 * @param array $args      'register_sidebar'で設定した「before_title, after_title, before_widget, after_widget」が入る
	 * @param array $instance  Widgetの設定項目
	 */
	public function widget( $args, $instance ) {
		$company_name = esc_html( $instance['company_name'] );
		$address      = esc_html( $instance['address'] );
		$tel          = esc_html( $instance['tel'] );
		echo "<div>${company_name}<br>${address}<br>${tel}</div>";
	}

	/*
	 * Widget管理画面を出力する
	 *
	 * @param array $instance 設定項目
	 * @return string|void
	 */
	public function form( $instance ){
		$company_name      = $instance['company_name'];
		$company_name_name = $this->get_field_name('company_name');
		$company_name_id   = $this->get_field_id('company_name');

		$address      = $instance['address'];
		$address_name = $this->get_field_name('address');
		$address_id   = $this->get_field_id('address');
		
		$tel      = $instance['tel'];
		$tel_name = $this->get_field_name('tel');
		$tel_id   = $this->get_field_id('tel');
		?>
		<p>
			<label for="<?php echo $company_name_id; ?>">会社名:</label>
			<input class="widefat" id="<?php echo $company_name_id; ?>" name="<?php echo $company_name_name; ?>" type="text" value="<?php echo esc_attr( $company_name ); ?>">
		</p>
		<p>
			<label for="<?php echo $address_id; ?>">所在地:</label>
			<input class="widefat" id="<?php echo $address_id; ?>" name="<?php echo $address_name; ?>" type="text" value="<?php echo esc_attr( $address ); ?>">
		</p>
		<p>
			<label for="<?php echo $tel_id; ?>">TEL:</label>
			<input class="widefat" id="<?php echo $tel_id; ?>" name="<?php echo $tel_name; ?>" type="text" value="<?php echo esc_attr( $tel ); ?>">
		</p>
		<?php
	}

	/*
	 * 新しい設定データが適切なデータかどうかをチェックする。
	 * 必ず$instanceを返す。さもなければ設定データは保存（更新）されない。
	 *
	 * @param array $new_instance  form()から入力された新しい設定データ
	 * @param array $old_instance  前回の設定データ
	 * @return array               保存（更新）する設定データ。falseを返すと更新しない。
	 */
	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}
}

add_action( 'widgets_init', function () {
	register_widget( 'FooterCompanyData' );
	register_sidebar( [
		'name'          => 'フッター',
		'id'            => 'footer-widget',
	] );
} );
