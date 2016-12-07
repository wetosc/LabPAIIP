using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Runtime.InteropServices.WindowsRuntime;
using Windows.Foundation;
using Windows.Foundation.Collections;
using Windows.UI;
using Windows.UI.Popups;
using Windows.UI.Xaml;
using Windows.UI.Xaml.Controls;
using Windows.UI.Xaml.Controls.Primitives;
using Windows.UI.Xaml.Data;
using Windows.UI.Xaml.Input;
using Windows.UI.Xaml.Media;
using Windows.UI.Xaml.Media.Imaging;
using Windows.UI.Xaml.Navigation;

// The Blank Page item template is documented at http://go.microsoft.com/fwlink/?LinkId=234238

namespace App
{
    /// <summary>
    /// An empty page that can be used on its own or navigated to within a Frame.
    /// </summary>
    public sealed partial class Main : Page
    {
        private List<Notebook> shopList;
        private List<Notebook> cart;

        public Main()
        {
            this.InitializeComponent();
            shopList = new List<Notebook>();
            cart = new List<Notebook>();
            shopList.Add(new Notebook("Lenovo IdeaPad 100 15IBD", 8899, "15.6\" LED, Intel Core i3 - 5020U, 8 GB DDR3, 500 GB, 2.3 kg", "https://www.zap.md/sites/default/files/imagecache/product_by_category/lenovo-ideapad-100-15.png"));
            shopList.Add(new Notebook("Acer Aspire E5-575G", 13599, "15.6\" LED, Intel Core i3 - 7100U, 8 GB DDR4, 2 TB, 2.4 kg", "https://www.zap.md/sites/default/files/imagecache/product_by_category/acer-aspire-e5-575g.png"));
            shopList.Add(new Notebook("ASUS Vivobook X556UQ", 13899, "15.6\" LED, Intel Core i5 - 6200U, 8 GB DDR4, 1 TB, 2.3 kg", "https://www.zap.md/sites/default/files/imagecache/product_by_category/asus-x556uq-brown-2.png"));
            shopList.Add(new Notebook("Lenovo IdeaPad 300 171SK", 13999, "17.3\" LED, Intel Core i5 - 6200U, 8 GB DDR3, 1 TB, 3.0 kg", "https://www.zap.md/sites/default/files/imagecache/product_by_category/lenovo-ideapad-300-17isk.png"));
            shopList.Add(new Notebook("HP Pavilion 15", 14899, "15.6\" LED tactil, Intel Core i5 - 6200U, 8 GB DDR3, 1 TB, 2.29 kg", "https://www.zap.md/sites/default/files/imagecache/product_by_category/hp-pavilion-15.png"));
            shopList.Add(new Notebook("Lenovo ThinkPad E460", 14999, "14\" IPS, Intel Core i5 - 6200U, 8 GB DDR3, 1 TB, 1.9 kg", "https://www.zap.md/sites/default/files/imagecache/product_by_category/lenovo-thinkpad-e460.png"));
            shopList.Add(new Notebook("Acer Aspire E5-575G", 14199, "15.6\" LED, Intel Core i5 - 7200U, 8 GB DDR4, 1 TB, 2.39 kg", "https://www.zap.md/sites/default/files/imagecache/product_by_category/acer-575-8gb_0.png"));
            shopList.Add(new Notebook("ASUS X302UA", 15099, "13.3\" LED, Intel Core i5 - 6200U, 8 GB DDR3, SSD 128 GB, 1.6 kg", "https://www.zap.md/sites/default/files/imagecache/product_by_category/asus-x302ua.png"));
            shopList.Add(new Notebook("ASUS X540LA", 15099, "15.6\" LED, Intel Core i7 - 5500U, 8 GB DDR3, 1 TB, 1.9 kg", "https://www.zap.md/sites/default/files/imagecache/product_by_category/asus-x540sa.png"));
            shopList.Add(new Notebook("ASUS VivoBook V500CA", 15199, "15.6\" LED tactil, Intel Core i7 - 3537U, 8 GB DDR3, 500 GB, 2.6 ", "https://www.zap.md/sites/default/files/imagecache/product_by_category/asus-vivobook-v500ca.png"));
            shopList.Add(new Notebook("HP ProBook 450 G3", 15299, "15.6\" LED, Intel Core i5 - 6200U, 8 GB DDR4, 1 TB, 2.07 kg", "https://www.zap.md/sites/default/files/imagecache/product_by_category/asus-x556uq-brown-2.png"));
            shopList.Add(new Notebook("Acer Aspire E5-774G", 15399, "17.3\" LED, Intel Core i5 - 7200U, 8 GB DDR4, 1 TB, 2.9 kg", "https://www.zap.md/sites/default/files/imagecache/product_by_category/acer-aspire-e5-774g.png"));
            shopList.Add(new Notebook("Acer Swift 3", 15499, "14\" IPS, Intel Core i5 - 6200U, 8 GB DDR4, 256 GB SSD, 1.6 kg", "https://www.zap.md/sites/default/files/imagecache/product_by_category/acer-swift-3-sparkly-silver.png"));


            listView.ItemsSource = shopList;
        }

        private void listView_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            ListView listview = sender as ListView;
            Notebook notebook = listview.SelectedItem as Notebook;

            cart.Add(notebook);

            productCounter.Text = cart.Count.ToString();
            ListViewItem item = listview.ContainerFromItem(notebook) as ListViewItem;
            if (item != null)
            {
                item.Background = new SolidColorBrush(Color.FromArgb(0xff, 0xF1, 0xC4, 0x0F));
            }
        }

        private void submit_Click(object sender, RoutedEventArgs e)
        {
            if (cart.Count > 0)
            {
                this.Frame.Navigate(typeof(Buy), cart);
            }
        }

        protected override void OnNavigatedTo(NavigationEventArgs e)
        {
            string purchased = e.Parameter as string;
            if (purchased != null)
            {
                this.cart = new List<Notebook>();
                productCounter.Text = cart.Count.ToString();
                showMessage(purchased);
            }
        }

        private async void showMessage(string text)
        {
            var dialog = new MessageDialog(text);
            await dialog.ShowAsync();
        }

    }



    public class Notebook: Object
    {
        public string name { get; set; }
        public float price { get; set; }
        public string description{ get; set; }
        public BitmapImage image { get; set; }

        public Notebook()
        {
            this.name = "";
            this.price = 0;
            this.description = "";
        }

        public Notebook(string name, float price, string description, string imageURL)
        {
            this.name = name;
            this.price = price;
            this.description = description;

            image = new BitmapImage();
            image.UriSource = new Uri(imageURL, UriKind.Absolute);
        }
    }
}
