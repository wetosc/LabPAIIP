using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.IO;
using System.Linq;
using System.Runtime.InteropServices.WindowsRuntime;
using Windows.Foundation;
using Windows.Foundation.Collections;
using Windows.UI.Xaml;
using Windows.UI.Xaml.Controls;
using Windows.UI.Xaml.Controls.Primitives;
using Windows.UI.Xaml.Data;
using Windows.UI.Xaml.Input;
using Windows.UI.Xaml.Media;
using Windows.UI.Xaml.Navigation;

// The Blank Page item template is documented at http://go.microsoft.com/fwlink/?LinkId=234238

namespace App
{
    /// <summary>
    /// An empty page that can be used on its own or navigated to within a Frame.
    /// </summary>
    public sealed partial class Buy : Page
    {
        private ObservableCollection<Notebook> cart;

        public Buy()
        {
            this.InitializeComponent();
        }


        protected override void OnNavigatedTo(NavigationEventArgs e)
        {
            List<Notebook> cart = e.Parameter as List<Notebook>;
            if (cart != null)
            {
                this.cart = new ObservableCollection<Notebook>(cart);
                listView.ItemsSource = cart;
                calculateTotal();
            }
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            var item = (sender as Button).DataContext as Notebook;
            cart.Remove(item);
            listView.ItemsSource = cart;
            calculateTotal();
        }

        private void submit_Click(object sender, RoutedEventArgs e)
        {
            this.Frame.Navigate(typeof(Main), String.Format("Thank for your purchase !!!\nYou paid {0} lei for {1} notebooks.", calculateTotal(), cart.Count));
        }

        private float calculateTotal()
        {
            float price = 0;
            foreach (Notebook notebook in cart)
            {
                price += notebook.price;
            }
            priceLabel.Text = price.ToString();
            return price;
        }
    }
}
