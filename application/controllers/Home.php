<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['title'] = 'Home';

		$data['cat'] = $this->catModel->getcategory();
		$data['estab'] = $this->estabModel->getestabs();
		$data['reviews'] = $this->reviewModel->review();
		$this->base->load('default', 'customer/home', $data);
	}

	public function about()
	{

		$data['title'] = 'About Us';

		$this->base->load('default', 'customer/about', $data);
	}
	public function contact()
	{
		$data['title'] = 'Contact Us';

		$this->base->load('default', 'customer/contact', $data);
	}
	public function establishment()
	{

		$data['estab'] = $this->estabModel->estabs();
		$data['title'] = 'All Establishment';

		$this->base->load('default', 'customer/establishment', $data);
	}
	public function establishment_info($id)
	{
		$data['estab'] = $this->estabModel->getestab($id);
		$data['ratings'] = $this->reviewModel->getratings($id);
		$data['reviews'] = $this->reviewModel->getreview($id);

		$data['title'] = 'Establishment Profile';
		$this->base->load('default', 'customer/establishment_info', $data);
	}
	public function category()
	{
		$data['cat'] = $this->catModel->category();
		$data['title'] = 'All Categories';

		$this->base->load('default', 'customer/category', $data);
	}

	public function category_info($id)
	{
		$data['estab'] = $this->catModel->category_info($id);
		$data['name'] = $this->catModel->category($id);
		$data['title'] = $data['name']->name;

		$this->base->load('default', 'customer/category_info', $data);
	}

	public function listing()
	{
		$user = $this->ion_auth->user()->row();
		$data['cat'] = $this->catModel->category();


		$data['estab'] = $this->estabModel->estabishment($user->id);

		$data['title'] = 'My Listing';

		$this->base->load('default', 'customer/listing', $data);
	}

	public function my_review()
	{
		$user = $this->ion_auth->user()->row();
		$data['review'] = $this->reviewModel->myreview($user->id);

		$data['title'] = 'My Review';

		$this->base->load('default', 'customer/my_review', $data);
	}
}
